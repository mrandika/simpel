<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Voters;
use App\Candidate;

class VotersController extends Controller
{
    //
    function validateVoters(Request $request) {
        $validatedData = $request->validate([
            'session' => 'required',
            'idektp' => 'required',
        ]);

        $tpsId = $request->post('tpsId');
        $uid = $request->post('idektp');

        // TODO: Error Handling Here, if the data returns null.
        $votersData = Voters::find($uid)->first();
        $voters = Voters::find($uid)->select('isVoted', 'voteAt')->first();

        if ($voters != null) {
            if ($voters->isVoted != 1) {
                return redirect()->route('vote.input')->with('data', $votersData)->with('id', $uid)->with('tps', $tpsId);
            } else {
                return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "You already voted")->with('tps', $tpsId);
            }
        } else {
            return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "Your data is unavailable")->with('tps', $tpsId);
        }
    }

    function vote(Request $request) {
        $tps = $request->post('tpsId');
        $uid = $request->post('idektp');
        $picked = $request->post('candidates');

        $validatedData = $request->validate([
            'idektp' => 'required',
            'tpsId' => 'required',
        ]);

        $votersData = DB::table('voters')->select('voteAt')->where('rfid', $uid)->first();

        if ($votersData->voteAt != $tps) {
            return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "Your data is unavailable at this TPS.\nYour vote didn't count.")->with('tps', $tps);
        }

        if ($picked != null) {
            $candidates = Candidate::find($picked);
            $currentVoteCount = $candidates->voteCount;
            $candidates->voteCount = $currentVoteCount + 1;
            $candidates->save();
        }

        $voters = Voters::find($uid);
        $voters->isVoted = 1;
        $voters->save();

        return redirect()->route('vote.home')->with('access', str_random(10))->with('success', "ok")->with('tps', $tps);;
    }
}
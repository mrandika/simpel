<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $votersData = DB::table('voters')->where('rfid', $uid)->first();
        $voters = DB::table('voters')->select('isVoted', 'voteAt')->where('rfid', $uid)->first();

        if ($voters != null) {
            if ($voters->isVoted != 1) {
                if ($voters->voteAt == $tpsId) {
                    return redirect()->route('vote.input')->with('data', $votersData)->with('id', $uid);
                } else {
                    return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "Your data is unavailable at this TPS")->with('tps', $tpsId);
                }
            } else {
                return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "You already voted")->with('tps', $tpsId);
            }
        } else {
            return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "Your data is unavailable")->with('tps', $tpsId);
        }
    }

    function vote(Request $request) {
        $uid = $request->post('idektp');
        $picked = $request->post('candidates');

        $validatedData = $request->validate([
            'candidates' => 'required',
            'idektp' => 'required',
        ]);

        $currentVoteCount = DB::table('candidates')->select('voteCount')->where('id', $picked)->first();

        DB::table('voters')->where('rfid', $uid)->update(
            [
                'isVoted' => 1
            ]
        );

        DB::table('candidates')->where('id', $picked)->update(
            [
                'voteCount' => $currentVoteCount->voteCount + 1
            ]
        );

        return redirect()->route('vote.home')->with('success', "ok")->with('access', str_random(10));
    }
}
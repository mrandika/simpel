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

        $session = $request->post('session');
        $uid = $request->post('idektp');
        $votersData = DB::table('voters')->where('rfid', $uid)->first();

        $voters = DB::table('voters')->select('isVoted')->where('rfid', $uid)->first();

        if ($voters->isVoted != 1) {
            return redirect()->route('vote.input')->with('data', $votersData)->with('id', $uid);
        } else {
            return redirect()->route('vote.home')->with('access', str_random(10))->with('error', "You already voted");
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

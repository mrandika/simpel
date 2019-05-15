<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    //
    function tpsData() {
        $tps = DB::table('vote_places')->select('number')->where('usersInCharge', Auth::user()->id)->first();
        $votersHere = DB::table('voters')->where('voteAt', $tps->number);
        $voted = DB::table('voters')->where([['isVoted', 1], ['voteAt', $tps->number]])->count();

        $validPoll = round(($voted/$votersHere->count())*100);
    }
}
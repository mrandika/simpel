<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TPSValidator extends Controller
{
    //
    function validateData(Request $request) {

        $provinces = $request->post('provinces');
        $districts = $request->post('districts');
        $subdistricts = $request->post('subdistricts');
        $urbanvillages = $request->post('urbanvillages');
        $tpsid = $request->post('tpsid');
        $uid = $request->post('uid');

        $tpsUid = DB::table('vote_places')->select('uid')->where([
            ['provinceId', '=', $provinces],
            ['districtId', '=', $districts],
            ['subDistrictId', '=', $subdistricts],
            ['urbanVillageId', '=', $urbanvillages],
            ['number', '=', $tpsid],
            ['uid', '=', $uid]
        ])->first();

        $validatedData = $request->validate([
            'provinces' => 'required',
            'districts' => 'required',
            'subdistricts' => 'required',
            'urbanvillages' => 'required',
            'tpsid' => 'required',
            'uid' => 'required|in:'.$tpsUid->uid,
        ]);

        return redirect()->route('vote.home')->with('access', str_random(10));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\VotePlace;

class TPSController extends Controller
{
    //
    function validateData(Request $request) {

        $provinces = $request->post('provinces');
        $districts = $request->post('districts');
        $subdistricts = $request->post('subdistricts');
        $urbanvillages = $request->post('urbanvillages');
        $tpsid = $request->post('tpsid');
        $uid = $request->post('uid');

        $tpsNo = VotePlace::select('id')->where([
            ['provinceId', '=', $provinces],
            ['districtId', '=', $districts],
            ['subDistrictId', '=', $subdistricts],
            ['urbanVillageId', '=', $urbanvillages],
            ['number', '=', $tpsid],
            ['uid', '=', $uid]
        ])->first();

        $tpsUid = VotePlace::select('uid')->where([
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

        return redirect()->route('vote.home')->with('access', str_random(10))->with('tps', $tpsNo->id);
    }
}

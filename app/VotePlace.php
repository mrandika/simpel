<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotePlace extends Model
{
    //
    protected $fillable = ['number', 'uid', 'usersInCharge', 'provinceId', 'districtId', 'subDistrictId', 'urbanVillageId'];
    public $timestamps = false;
}

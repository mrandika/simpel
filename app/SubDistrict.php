<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    //
    protected $fillable = ['districtId', 'name'];
    public $timestamps = false;
}

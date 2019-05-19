<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrbanVillage extends Model
{
    //
    protected $fillable = ['subDistrictId', 'name'];
    public $timestamps = false;
}

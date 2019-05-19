<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $fillable = ['provinceId', 'name'];
    public $timestamps = false;
}

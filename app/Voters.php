<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    //
    protected $primaryKey = 'rfid';
    protected $fillable = ['nik', 'rfid', 'name', 'isVoted', 'voteAt'];
    public $timestamps = false;
}

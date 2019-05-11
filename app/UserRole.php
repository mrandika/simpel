<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $primaryKey = 'user_id';
    protected $table = 'role_user';
    public $timestamps = false;
	protected $fillable = [
		'user_id', 'role_id'
    ];
    
    public function users() {
    	return $this->belongsToMany(User::class);
    }
}

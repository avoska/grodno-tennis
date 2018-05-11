<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

	public $timestamps = false;

	public function users()
 {
     return $this->belongsToMany('App\User', 'users_roles', 'user_id', 'role_id');
 }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model {

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'lastname', 'name', 'secondname', 'age', 'matches', 'wins', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token', 'role'
	];

	public function matches_users() {
		return $this->belongsToMany('App\Match_has_user', 'match-user', 'id', 'user_id');
	}

	public function users_tournaments() {
		return $this->belongsToMany('App\Tournament_has_user', 'tournament-user', 'id', 'user_id');
	}
}

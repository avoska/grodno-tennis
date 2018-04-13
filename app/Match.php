<?php
/**
 * Created by PhpStorm.
 * User: Yan
 * Date: 05.04.2018
 * Time: 1:18
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Match extends Model {

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'date', 'time', 'type', 'status',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'rememberToken',
	];

	public function users_matches() {
		return $this->belongsToMany('App\Match.has.user', 'match-user', 'id', 'match_id');
	}
}

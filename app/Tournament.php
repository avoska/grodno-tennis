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

class Tournament extends Model {

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'date_of_start', 'time', 'playground_id', 'max_players', 'created_at', 'updated_at',
	];

	protected $hidden = [

	];

	/*	public function tournaments_users() {
			return $this->belongsToMany('App\Tournament_has_user', 'tournament-user', 'id', 'tournament_id');
		}*/
}

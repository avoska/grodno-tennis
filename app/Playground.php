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

class Playground extends Model {

	use Notifiable;
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'address', 'worktime', 'surface', 'type',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [

	];

}

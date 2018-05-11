<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class RequestTable extends Model {

	use Notifiable;
	public $timestamps = false;

	protected $fillable = [
		'user_requester_id', 'user_responser_id', 'date', 'time', 'playground_id', 'status',
	];

	protected $hidden = [

	];
}

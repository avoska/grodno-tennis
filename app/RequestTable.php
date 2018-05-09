<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class RequestTable extends Model {

	use Notifiable;

	protected $fillable = [
		'user_requester_id', 'user_responser_id', 'date', 'time', 'playground_id', 'status',
	];

	protected $hidden = [

	];
}

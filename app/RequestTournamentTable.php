<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestTournamentTable extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'user_requester_id', 'user_responser_id', 'tournament_id',
	];
}

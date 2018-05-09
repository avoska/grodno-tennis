<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegModel extends Model
{
    protected $fillable = [
    	'user_requester_id', 'user_responser_id', 'date', 'time', 'playground_id', 'status',
	    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected $primaryKey='id';

    protected $fillable = [
        'first_name', 'last_name', 'second_name', 'email', 'age', 'password', 'remember_token', 'created_at', 'updated_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
    	'id' => 'integer',
	    'email' => 'string',
	    'first_name' => 'string',
	    'last_name' => 'string',
	    'second_name' => 'string',
		'password'=> 'string',
    	'age' => 'integer',
    ];
}

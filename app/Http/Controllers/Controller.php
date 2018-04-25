<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;

class Controller extends BaseController
{
	public function main(){

		return view('main');
	}

	public function authorize()
	{
	  return true;
	}

	public function login(){
		//
		return view('/');
	}

	public function atom(){

		return view('atom');
	}

	public function personal_room(){

		return view('personal-room');
	}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

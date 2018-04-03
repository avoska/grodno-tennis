<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	public function main(){

		return view('main');
	}

	public function atom(){

		return view('atom');
	}

	public function personal_room(){

		return view('personal-room');
	}

	public function registration(){

		return view('registration');
	}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

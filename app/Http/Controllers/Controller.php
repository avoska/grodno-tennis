<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\User;
use App\Match;
use App\RequestTable;

class Controller extends BaseController {

	public function main() {
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
		return view('main', ['users' => $users]);
	}

	public function authorize() {
		return true;
	}

	public function atom() {

		return view('atom');
	}

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

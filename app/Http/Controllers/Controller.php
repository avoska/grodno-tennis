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
		//$users = DB::table('users')->orderBy('rating','DESC')->simplePaginate(3);
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(3);
		if(!is_null(RequestTable::where('status', '=', 0))) {
			$wait_requests = DB::table('request_table')->select('id','user_requester_id','user_responser_id','date','time','playground_id','status')->where('status', '=', 0)->orderBy('created_at', 'DESC')->paginate(5);
		}

		//if(!is_null(DB::table('matches')->select('matches.id')->join('match_user', 'matches.id', '=', 'match_user.match_id'))) {
			$approved_requests = DB::table('matches')->select('matches.id', 'matches.date', 'matches.time', 'matches.playground_id', 'matches.type', 'matches.status', 'matches.created_at', 'matches.updated_at', 'match_user.user_id', 'match_user.match_id', 'match_user.team')->join('match_user', 'matches.id', '=', 'match_user.match_id')->orderBy('date', 'DESC')->paginate(5);
		//dd($approved_requests);

		//}
		return view('atom', ['users' => $users],[ 'request_table' => $wait_requests],['matches','match_user' => $approved_requests]);
		//return view('atom', compact('users'));
	}

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

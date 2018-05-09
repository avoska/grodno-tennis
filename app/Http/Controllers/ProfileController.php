<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\RequestTable;

class ProfileController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function profile() {
		$my_matches = DB::table('match_user')->join('matches', 'matches.id', '=', 'match_user.match_id')->join('users','match_user.user_id','=','users.id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'matches.playground_id')->select( 'users.surname' , 'users.name' , 'users.sname','match_user.id','playgrounds.address','playgrounds.surface','playgrounds.type','playgrounds.worktime')->where('user_id','=',Auth::user()->id)->orderBy('date', 'DESC')->paginate(3);
		$matches= DB::table('match_user')->join('matches', 'matches.id', '=', 'match_user.match_id')->join('users','match_user.user_id','=','users.id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'matches.playground_id')->select( 'users.surname' , 'users.name' , 'users.sname','match_user.*','playgrounds.address','playgrounds.surface','playgrounds.type','playgrounds.worktime')->where('match_user.id','=',array_get($my_matches,id))->where('match_user_id','<>',Auth::user()->id)->orderBy('date', 'DESC')->paginate(3);
		return view('personal-room', [
			'matches' => $matches,
		]);
	}

	public function profile_all_players() {
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(3);
		return view('personal-room-all-players', ['users' => $users]);
	}

	public function profile_my_data() {
		$authUser = Auth::user();
		return view('personal-room-my-data', [
			'authUser' => $authUser,
		]);
	}

	public function profile_invites() {
		$wait_requests = DB::table('request_table')->join('users', 'users.id', '=', 'request_table.user_requester_id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'request_table.playground_id')->select('request_table.*', 'users.surname' , 'users.name' , 'users.sname','playgrounds.address','playgrounds.surface','playgrounds.type','playgrounds.worktime')->where('status', '=', 0)->where('user_responser_id','=',Auth::user()->id)->orderBy('request_table.date', 'DESC')->paginate(5);
		return view('personal-room-invites', ['wait_requests' => $wait_requests]);
	}

	//'playgrounds.address', 'playgrounds.worktime','playgrounds.surface','playgrounds.type',
	//->join('playgrounds', 'playgrounds.id', '=', 'request_table.playground_id')

	public function profile_my_requests() {
		$my_requests = DB::table('request_table')->join('users','users.id','=','request_table.user_responser_id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'request_table.playground_id')->select('request_table.*','users.surname', 'users.name', 'users.sname','playgrounds.address','playgrounds.surface','playgrounds.type','playgrounds.worktime')->where('status', '=', 0)->where('user_requester_id','=',Auth::user()->id)->orderBy('date', 'DESC')->paginate(5);

		return view('personal-room-my-requests', ['my_requests' => $my_requests]);
	}

	public function delete_request(Request $request){
		//dd($request);
		DB::table('request_table')->where('id','=', $request->id)->delete();
		return  redirect('personal-room-my-requests');
	}
}

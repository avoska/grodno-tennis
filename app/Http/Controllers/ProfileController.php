<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\RequestTable;
use App\MatchUser;
use App\Match;

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
		$my_matches = array();
		$matches = DB::table('match_users')->join('matches', 'matches.id', '=', 'match_users.match_id')->join('users', 'match_users.user_id', '=', 'users.id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'matches.playground_id')->select('users.surname', 'users.name', 'users.sname', 'match_users.id', 'match_users.match_id', 'playgrounds.address', 'playgrounds.surface', 'playgrounds.type', 'playgrounds.worktime', 'matches.status', 'matches.type', 'matches.date', 'matches.time')->where('user_id', '=', Auth::user()->id)->orderBy('date', 'DESC')->get();
		//dd($matches);
		foreach($matches as $match) {
			//dd($match->match_id);
			$my_match = DB::table('match_users')->join('matches', 'matches.id', '=', 'match_users.match_id')->join('users', 'match_users.user_id', '=', 'users.id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'matches.playground_id')->select('users.surname', 'users.name', 'users.sname', 'users.rating', 'match_users.*', 'playgrounds.address', 'playgrounds.surface', 'playgrounds.type', 'playgrounds.worktime', 'matches.status', 'matches.type', 'matches.date', 'matches.time')->where('match_users.match_id', '=', $match->match_id)->where('match_users.user_id', '!=', Auth::user()->id)->orderBy('date', 'DESC')->get();
			//	dd($my_match);
			foreach($my_match as $my_m) {
				//dd($my_m);
				$my_matches[] = $my_m;
			}
			//dd($my_matches);
		}
		$authUser = Auth::user();
		return view('my-matches', [
			'my_matches' => $my_matches, 'authUser' => $authUser
		]);
	}

	public function profile_all_players() {
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
		$authUser = Auth::user();
		$playgrounds = DB::table('playgrounds')->get();
		return view('all-players', ['users' => $users, 'authUser' => $authUser, 'playgrounds' => $playgrounds]);
	}

	public function profile_my_data() {
		$authUser = Auth::user();
		return view('personal-data', [
			'authUser' => $authUser,
		]);
	}

	public function profile_invites() {
		$wait_requests = DB::table('request_tables')->join('users', 'users.id', '=', 'request_tables.user_requester_id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'request_tables.playground_id')->select('request_tables.*', 'users.surname', 'users.name', 'users.sname', 'playgrounds.address', 'playgrounds.surface', 'playgrounds.type', 'playgrounds.worktime')->where('status', '=', 0)->where('user_responser_id', '=', Auth::user()->id)->orderBy('request_tables.date', 'DESC')->paginate(5);
		$authUser = Auth::user();
		return view('invites', ['wait_requests' => $wait_requests, 'authUser' => $authUser]);
	}

	public function profile_my_requests() {
		$my_requests = DB::table('request_tables')->join('users', 'users.id', '=', 'request_tables.user_responser_id')->leftJoin('playgrounds', 'playgrounds.id', '=', 'request_tables.playground_id')->select('request_tables.*', 'users.surname', 'users.name', 'users.sname', 'playgrounds.address', 'playgrounds.surface', 'playgrounds.type', 'playgrounds.worktime')->where('status', '=', 0)->where('user_requester_id', '=', Auth::user()->id)->orderBy('date', 'DESC')->paginate(5);
		$authUser = Auth::user();
		return view('my-requests', ['my_requests' => $my_requests, 'uahtUser' => $authUser]);
	}

	public function delete_request(Request $request) {
		DB::table('request_tables')->where('id', '=', $request->id)->delete();
		return redirect('my-requests');
	}

	public function delete_request_in_invites(Request $request) {
		DB::table('request_tables')->where('id', '=', $request->id)->delete();
		return redirect('invites');
	}

	public function add_match(Request $request) {

		$add_requests = DB::table('request_tables')->select('request_tables.id', 'request_tables.time', 'request_tables.date', 'request_tables.playground_id', 'request_tables.user_responser_id', 'request_tables.user_requester_id')->where('id', '=', $request->id)->get();

		foreach($add_requests as $add_request) {

			$match = new Match();
			$match->date = $add_request->date;
			$match->time = $add_request->time;
			$match->playground_id = $add_request->playground_id;
			$match->type = '1v1';
			$match->save();

			$match_user1 = new MatchUser();
			$match_user1->user_id = $add_request->user_requester_id;
			$match_user1->match_id = $match->id;
			$match_user1->save();

			$match_user2 = new MatchUser();
			$match_user2->user_id = $add_request->user_responser_id;
			$match_user2->match_id = $match->id;
			$match_user2->save();
		}
		DB::table('request_tables')->where('id', '=', $request->id)->delete();
		return redirect('invites');
	}

	public function add_request(Request $request) {

		$request_table = new RequestTable();
		$request_table->user_responser_id = $request->user_responser_id;
		$request_table->user_requester_id = Auth::user()->id;
		$request_table->date = $request->date;
		$request_table->time = $request->time;
		$request_table->playground_id = $request->playground_id;
		$request_table->save();

		return redirect('all-players');
	}

}

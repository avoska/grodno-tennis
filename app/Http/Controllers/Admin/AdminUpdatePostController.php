<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminUpdatePostController extends Controller {

	public function show_update_tournament() {
		$tournaments = DB::table('tournaments')->paginate(10);
		$playgrounds = DB::table('playgrounds')->get();
		return view('admin-update-tournament', ['playgrounds' => $playgrounds, 'tournaments' => $tournaments]);
	}

	public function update_tournament(Request $request) {
		$this->validate($request, [
			'name' => 'required|string',
			'date_of_start' => 'required|date',
			'date_of_finish' => 'required|date|after:date_of_start',
			'time' => 'required|string|min:5|max:5',
			'playground_id' => 'required|integer',
			'max_players' => 'required|integer'
		]);

		DB::table('tournaments')->where('id', $request->input('id'))->update(['name' => $request->input('name')]);
		DB::table('tournaments')->where('id', $request->input('id'))->update(['date_od_start' => $request->input('date_of_start')]);
		DB::table('tournaments')->where('id', $request->input('id'))->update(['date_od_finish' => $request->input('date_of_finish')]);
		DB::table('tournaments')->where('id', $request->input('id'))->update(['time' => $request->input('time')]);
		DB::table('tournaments')->where('id', $request->input('id'))->update(['playground_id' => $request->input('playground_id')]);
		DB::table('tournaments')->where('id', $request->input('id'))->update(['max_players' => $request->input('max_players')]);

		return redirect('/admin_update_tournament');
	}

	public function show_update_playground() {
		$playgrounds = DB::table('playgrounds')->paginate(10);
		return view('admin-update-playground', ['playgrounds' => $playgrounds]);
	}

	public function update_playground(Request $request) {
		$this->validate($request, [
			'name' => 'required|string',
			'worktime' => 'required|string',
			'surface' => 'required',
			'type' => 'required',
		]);

		DB::table('playgrounds')->where('id', $request->input('id'))->update(['address' => $request->input('address')]);
		DB::table('playgrounds')->where('id', $request->input('id'))->update(['worktime' => $request->input('worktime')]);
		DB::table('playgrounds')->where('id', $request->input('id'))->update(['surface' => $request->input('surface')]);
		DB::table('playgrounds')->where('id', $request->input('id'))->update(['type' => $request->input('type')]);

		return redirect('/admin_update_tournament');
	}

	public function show_all_players() {
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
		$authUser = Auth::user();
		$playgrounds = DB::table('playgrounds')->get();
		return view('admin-all-players', ['users' => $users, 'authUser' => $authUser, 'playgrounds' => $playgrounds]);
	}

	public function update_players(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'surname' => 'required',
			'sname' => 'required',
			'age' => 'required',
		]);

		DB::table('users')->where('id', $request->input('id'))->update(['name' => $request->input('name')]);
		DB::table('users')->where('id', $request->input('id'))->update(['surname' => $request->input('surname')]);
		DB::table('users')->where('id', $request->input('id'))->update(['sname' => $request->input('sname')]);
		DB::table('users')->where('id', $request->input('id'))->update(['email' => $request->input('email')]);
		DB::table('users')->where('id', $request->input('id'))->update(['age' => $request->input('age')]);
		DB::table('users')->where('id', $request->input('id'))->update(['phone' => $request->input('phone')]);
		DB::table('users')->where('id', $request->input('id'))->update(['avatar' => $request->input('avatar')]);
		DB::table('users')->where('id', $request->input('id'))->update(['matches' => $request->input('matches')]);
		DB::table('users')->where('id', $request->input('id'))->update(['wins' => $request->input('wins')]);
		DB::table('users')->where('id', $request->input('id'))->update(['rating' => $request->input('rating')]);
		DB::table('users')->where('id', $request->input('id'))->update(['password' => bcrypt($request->input('password'))]);

		return redirect('/admin_all_players');
	}

	public function delete_player(Request $request) {
		DB::table('users')->where('id', '=', $request->id)->delete();
		return redirect('admin-all-players');
	}
}

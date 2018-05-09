<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUpdatePostController extends Controller {

	public function show() {
		return view('admin_update_tournament');
	}

	public function create(Request $request) {
		$this->validate($request, [
			'name' => 'required|string',
			'date_of_start' => 'required|date',
			'date_of_finish' => 'required|date|after:date_of_start',
			'time' => 'required|string|min:5|max:5',
			'playground_id' => 'required|integer',
			'max_players' => 'required|integer'
		]);

		DB::table('tournament')->where('name', $request->input('name'))->update(['name' => $request->input('name')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['date_od_start' => $request->input('date_of_start')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['date_od_finish' => $request->input('date_of_finish')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['time' => $request->input('time')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['playground_id' => $request->input('playground_id')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['max_players' => $request->input('max_players')]);
		DB::table('tournament')->where('name', $request->input('name'))->update(['updated_at' => new \DateTime()]);

		return redirect('/admin_update_tournament');
	}
}

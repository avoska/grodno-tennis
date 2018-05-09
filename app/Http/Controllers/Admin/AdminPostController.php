<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tournament;
use Auth;

class AdminPostController extends Controller {

	public function show_tournament() {
		return view('admin_add_tournament');
	}

	public function create_tournament(Request $request) {
		$this->validate($request, [
			'name' => 'required|string',
			'date_of_start' => 'required|date',
			'date_of_finish' => 'required|date|after:date_of_start',
			'time' => 'required|string|min:5|max:5',
			'playground_id' => 'required|integer',
			'max_players' => 'required|integer'
		]);

		$tournament = new Tournament();
		$tournament->name = $request->input('name');
		$tournament->date_of_start = $request->input('date_of_start');
		$tournament->date_of_finish = $request->input('date_of_finish');
		$tournament->time = $request->input('time');
		$tournament->playground_id = $request->input('playground_id');
		$tournament->max_players = $request->input('max_players');
		$tournament->created_at = new \DateTime();
		$tournament->save(['timestamps' => false]);

		return redirect('/admin-add-tournament');
	}

	public function show_playground() {
		return view('admin_add_playground');
	}

	public function create_playground(Request $request) {
		$this->validate($request, [
			'address' => 'required|string',
			'worktime' => 'required|string',
			'surface' => 'required|string',
			'type' => 'required|string',
		]);

		$playground = new Playground();
		$playground->address = $request->input('address');
		$playground->worktime = $request->input('worktime');
		$playground->surface = $request->input('surface');
		$playground->type = $request->input('type');
		$playground->created_at = new \DateTime();
		$playground->save(['timestamps' => false]);

		return redirect('/admin-add-playground');
	}
}

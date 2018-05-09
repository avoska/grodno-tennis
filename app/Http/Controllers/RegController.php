<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests;
use App\RequestTable;
use App\User;
use Illuminate\Support\Facades\DB;

class RegController extends Controller {

	public function index() {

	}

	public function create() {
		return view('personal-room-my-requests');
	}

	protected function formatValidationErrors(Validator $validator) {
		return $validator->errors()->all();
	}

	public function registration_of_table_request(Request $request) {
		$table = "request_table";
		$rules = [
			'user_responser_id' => 'required',
			'date' => 'required|date',
			'time' => 'required',
			'playground_id' => 'required|integer',
		];
		$messages = [
			'date.date' => 'Поле дата должно соответствовать формату даты.',
		];

		$this->validate($request, $rules, $messages);
		if($this->validate->fails()) {
			return redirect('post/create')
				->withErrors($this->validate())
				->withInput();
		}
		$requests_table = new RequestTable();
		$requests_table->user_requester_id = $request->input('user_requester_id');
		$requests_table->user_responser_id = $request->input('user_responser_id');
		$requests_table->date = $request->input('date');
		$requests_table->time = $request->input('time');
		$requests_table->playground_id = $request->input('playground_id');
		$requests_table->status = $request->input('status');
		$requests_table->save(['timestamps' => false]);

		return redirect('/personal-room-my-requests');
	}

	public function show($id) {

	}

	public function edit($id) {

	}

	public function update(Request $request, $id) {

	}

	public function destroy($id) {

	}

	use DispatchesJobs, ValidatesRequests;
}

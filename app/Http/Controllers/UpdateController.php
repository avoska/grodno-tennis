<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	protected function formatValidationErrors(Validator $validator) {
		return $validator->errors()->all();
	}

	public function store(Request $request) {
		$rules = [
			'name' => 'max:50',
			'surname' => 'max:50',
			'sname' => 'max:50',
			'age' => 'integer',
		];
		$messages = [
			//'age.digits' => 'Поле возраст должно содержать только цифры.',
		];

		$this->validate($request, $rules, $messages);
		/*	if($this->validate->fails()) {
				return redirect('post/create')
					->withErrors($this->validate())
					->withInput();
			}
		*/
		//	DB::update('update student set name = ? where id = ?',[$request->input('name'),$id]);

		DB::table('users')->where('email', Auth::user()->email)->update(['name' => $request->input('name')]);
		DB::table('users')->where('email', Auth::user()->email)->update(['surname' => $request->input('surname')]);
		DB::table('users')->where('email', Auth::user()->email)->update(['sname' => $request->input('sname')]);
		DB::table('users')->where('email', Auth::user()->email)->update(['age' => $request->input('age')]);
		DB::table('users')->where('email', Auth::user()->email)->update(['phone' => $request->input('phone')]);
		DB::table('users')->where('email', Auth::user()->email)->update(['updated_at' => new \DateTime()]);
		if($request->hasFile('avatar')) {
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

			DB::table('users')->where('email', Auth::user()->email)->update(['avatar' => $filename]);
		}
		//	$request->input('name');
		//	$request->input('surname');
		//	$request->input('sname');
		//	$request->input('email');
		//	$request->input('age');
		//	$request->input('password');
		//	$request->input('remember_token');
		//$user->updated_at = new \DateTime();

		return redirect('/personal-room-my-data');
	}
}

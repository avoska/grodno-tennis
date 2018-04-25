<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

	use AuthenticatesUsers;

	protected $redirectPath = '/personal-room';
	protected $loginPath = '/login';
	protected $redirectAfterLogout = '/login';
	protected $guard = 'admin';



	//protected $redirectTo = '/';

	public function login() {
		$user = new User();
		if(Auth::attempt(['email' => $email, 'password' => $password])) {
			// Аутентификация успешна
			return redirect()->intended('personal-room');
		}
	}

	public function logout(){
		Auth::logout();
	}

	public function __construct() {
		$this->middleware('guest')->except('logout');
	}
}

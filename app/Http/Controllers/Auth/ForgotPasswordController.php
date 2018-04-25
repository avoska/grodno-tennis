<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

	protected function guard()
	{
	  return Auth::guard('guard-name');
	}

    public function __construct()
    {
        $this->middleware('guest');
    }
}

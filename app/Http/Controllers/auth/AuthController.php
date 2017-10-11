<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\logincheck;
use App\Morley\Auth\LoginVerify;
use App\Subject;

class AuthController extends Controller
{
	public function __construct(){
		$this->middleware('authcheck');
	}

	// public function index(){
	// 	$subjects = Subject::where('status_id',1)->paginate(12);
	// 	return view('auth.main', compact('subjects'));
	// }

    public function login(){
    	return view('auth.login');
    }

    public function login_check(logincheck $check, LoginVerify $verify){
    	return $verify->log_me();

  
    }
}

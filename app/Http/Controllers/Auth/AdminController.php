<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{

	public function __construct()
    {
        // $this->middleware('guest:admin');
    }

    public function Login(Request $req)
    {
    	if(Guest::guard($guard)->check())
		{
			return Redirect()->Route('Administration');
		}
		else{
	    	// $req->session()->flush();
	        return view('Login');
	        // return bcrypt('admin');
		}

    }

    public function Login_check(Request $req)
    {
        if(Auth::guard('admin')->attempt(['email' => $req->input('email'),'password' => $req->input('password')]))
        {
            return Redirect()->Route('Administration');
        }
        else{

        	$req->session()->flush();
            return Redirect()->Back()->withErrors('Login Failed');
            // return 'fuck';
        }
    }
}

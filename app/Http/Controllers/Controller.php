<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function Login(Request $req)
    // {
    //     return view('Login');
    // }

    // public function Login_check(Request $req)
    // {
    //     if(Auth::guard('admin')->attemt(['Email' => 'abdelghao@gmail.com','Cin' => 'bj436258']))
    //     {
    //         return Redirect()->Route('Administration');
    //     }
    //     else{
    //         return Redirect()->Back()->withErrors('Login Failed');
    //     }
    // }
}

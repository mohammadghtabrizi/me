<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Http\Controllers\Controller;

use Hash;



class LoginController extends Controller
{

	public function index(){

		return view('admin.auth.login');


	}

    public function login(Request $request){


        $username = $request->get('email');

        $pass = $request->get('password');

        if(!Auth::guard('admin')->attempt(['email' => $username, 'password' => $pass])) {
            
            Session::flash('admin_login_faild','نام کاربری یا رمزعبور اشتباه می باشد!');

            return redirect()->back();

        }

        return redirect()->route('admin_dashboard');

    }


}

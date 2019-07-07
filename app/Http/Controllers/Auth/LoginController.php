<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Http\Controllers\Controller;



class LoginController extends Controller
{

    public function index(){

        return view('/auth/login');
    }

    public function login(Request $request){
        
        $username = $request->get('mobile');

        $pass = $request->get('password');

        $remember_me = $request->get('rememberme');

        if(!is_null($remember_me)){

            $remember_me = true;
        }


        if(!Auth::attempt(['mobile' => $username, 'password' => $pass], $remember_me)) {
            
            Session::flash('login_faild','نام کاربری یا رمزعبور اشتباه می باشد!');

            return redirect()->back();

        }

        return redirect()->route('dashboard_users');
        

    }


}

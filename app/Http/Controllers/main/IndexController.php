<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Newsletters;
use App\User;

use Validator;



class IndexController extends Controller
{
    public function comingsoon(){

    	$activeMenu = 'home';

    	return view('comingsoon')->with([



    		'activeMenu' => $activeMenu

    	]);

    }

    public function contactus(){

    	$activeMenu = 'contactus';

    	return view('contactus')->with([

    		'activeMenu' => $activeMenu

    	]);
    }

    public function aboutusview(){


        $activeMenu = 'aboutus';

        return view('aboutus')->with([

            'activeMenu' => $activeMenu
        ]);
    }   

    public function newsletter(Request $request){

        $roles = [

            'email' => 'email'

        ];

        $attributes = [


            'email' => 'ایمیل'


        ];

        $messages = [

            'email' => 'مقدار :attribute باید در فرمت ایمیل باشد.',

        ];


        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
        
        if($validate->fails()){


            $messagenewsletters['class'] = 'error-valid-email';

            return redirect()->back()->with('messagenewsletters',$messagenewsletters);


        }


        $checkexistemaildashboard =  User::select('users.id')->where('users.email','=',$request->get('email'))->count();

        $checkexistemailnewsletter = Newsletters::select('newsletters.id')->where('newsletters.email','=',$request->get('email'))->count();

        if($checkexistemaildashboard > 0 OR $checkexistemailnewsletter > 0){

            $messagenewsletters['class'] = 'error';

            return redirect()->back()->with('messagenewsletters',$messagenewsletters);

        }

        $newsletter = new Newsletters();

        $newsletter->email = $request->get('email');

        $newsletter->save();

        $messagenewsletters['class'] = 'success';

        return redirect()->back()->with('messagenewsletters',$messagenewsletters);

    }
}

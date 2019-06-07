<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Http\Controllers\Controller;

use Hash;

use Validator;



class DashboardController extends Controller
{

    public function index(){
        
    	return view('admin/dashboard-admin');
        
      	

    }

    public function editprofileview(){



    	return view('admin/profile/edit-profile-admin');

    }

    public function editprofilesecurity(Request $request){
        

        if(strlen($request->get('password')) < 8){

            $message['class'] = 'error-min';

            return redirect()->back()->with('message',$message);

        }

        $admin = Auth::guard('admin')->user();

        $password = $request->get('password');

        if(!is_null($password) && $password != ''){

            if($password != $request->get('retype-password')){
                
                $message['class'] = 'error';

                return redirect()->back()->with('message',$message);

            }

            $admin->password = Hash::make($request->get('password'));

        }

        $admin->save();


        $message['class'] = 'success';

        return redirect()->back()->with('message',$message);



    }

    public function editprofileaccount(Request $request){

    	$roles = [

            'name' => 'required|string|min:3',

            'lastname' => 'required|string|min:4',

        ];

        $attributes = [

            'name' => 'نام',

            'lastname' => 'نام خانوادگی',

        ];

        $messages = [

            'required' => 'وارد کردن مقدار :attribute اجباری می باشد'

        ];

        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
    	

        if($validate->fails()){

            $errors = $validate->errors();

            if(!is_null($errors->first('name'))){

                $message['class'] = 'name-error';

                return redirect()->back()->with('message',$message);

            }
            if(!is_null($errors->first('lastname'))){

                $message['class'] = 'lastname-error';

                return redirect()->back()->with('message',$message);

            }
            
        }


        $admin = Auth::guard('admin')->user();

        $admin->name = $request->get('name');

        $admin->lastname = $request->get('lastname');

        $admin->save();

        $message['class'] = 'success';

        return redirect()->back()->with('message',$message);
    	
    }


}

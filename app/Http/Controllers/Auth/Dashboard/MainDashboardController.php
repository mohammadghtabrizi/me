<?php

namespace App\Http\Controllers\Auth\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Activity;
use App\MeRequest;

use Auth;

use Hash;

use Session;

use Validator;

class MainDashboardController extends Controller
{   

    protected $statuses = [

        '0' => [

            'color' => 'text-warning',

            'title' => 'درحال بررسی'

        ],

        '1' => [

            'color' => 'text-info',

            'title' => 'درحال ارسال کارشناس'

        ],

        '2' => [

            'color' => 'text-success',

            'title' => 'تکمیل شده'

        ],

    ];


    public function Homeprofile(){

    	$activeMenu = '';
		
		$activeMenuDashboard = 'myprofile';

    	$date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B، %Y');

        $countrequests = MeRequest::where('userid','=',Auth::user()->id)->count();

    	return view('/auth/dashboard/dashboard')->with([

    		'activeMenu' => $activeMenu,
			
			'activeMenuDashboard' => $activeMenuDashboard,

    		'datenow' => $date,

            'countrequests' => $countrequests

    	]);
    }

    public function showmyrequest(){

        $activeMenu = '';
        
        $activeMenuDashboard = 'myrequest';

        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B، %Y');

        $requests = MeRequest::where('userid','=',Auth::user()->id)
            ->where('status','<=','2')
            ->paginate(25);

        $now = \Carbon\Carbon::now();

        $result = [];

        for($i = 1;$i<=3;$i++){

            $result[] = \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::now()->addDays($i))->format("%Y-%m-%d");

        }

        return view('/auth/dashboard/myrequest')->with([

            'activeMenu' => $activeMenu,
            
            'activeMenuDashboard' => $activeMenuDashboard,

            'datenow' => $date,

            'dates' => $result,

            'statuses' => $this->statuses,

            'services' => $this->services,

            'merequests' => $requests,

            'countrequests' => count($requests)

        ]);
    }


    public function showmyaddress(){

        $activeMenu = '';
        
        $activeMenuDashboard = 'myaddress';

        $date = \Morilog\Jalali\Jalalian::forge('now')->format('%d %B، %Y');

        $countrequests = MeRequest::where('userid','=',Auth::user()->id)->count();

        return view('/auth/dashboard/user-address')->with([

            'activeMenu' => $activeMenu,
            
            'activeMenuDashboard' => $activeMenuDashboard,

            'datenow' => $date,

            'statuses' => $this->statuses,

            'services' => $this->services,

            'countrequests' => $countrequests

        ]);
    }

    public function UpdateUserProfile(Request $request){

        
        
        $roles = [

            'name' => 'required|string|min:3',

            'lastname' => 'required|string|min:5',

            'email' => 'nullable|email'

        ];

        $attributes = [

            'name' => 'نام',

            'lastname' => 'نام خانوادگی',

            'email' => 'ایمیل'

        ];

        $messages = [

            'required' => 'وارد کردن مقدار :attribute اجباری می باشد',

            'email' => 'مقدار :attribute باید در فرمت ایمیل باشد.',

            'numeric' => 'مقدار :attribute باید در نوع عددی باشد'

        ];

        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
    	

        if($validate->fails()){

            $message['message'] = 'مشکلی در ثبت اطلاعات شما به وجود آمده لطفا خطاهای زیر را بررسی و دوباره امتحان نمایید .';

            $message['class'] = 'alert-warning';

            return redirect()->back()->withErrors($validate)->with('message',$message);

        }


        $password = $request->get('password');

        $user = Auth::user();

        $user->name = $request->get('name');

        $user->lastname = $request->get('lastname');

        $user->email = $request->get('email');

        $newsletters = $request->get('newsletters');
        
        if($newsletters == "true"){
            
            $user->newsletters = 1;
        }
        else{
            $user->newsletters = 0;
        }

        if(!is_null($password) && $password != ''){

            if($password != $request->get('passwordre')){
				

                $message['message'] = 'پسورد باید با تکرار آن برابر باشد';

            	$message['class'] = 'alert-warning';

                return redirect()->back()->with('message',$message);

            }

            $user->password = Hash::make($request->get('password'));

        }

        $user->save();


        $message['message'] = 'بروزرسانی اطلاعات شما با موفقیت انجام شد .';

        $message['class'] = 'alert-success';

        return redirect()->back()->with('message',$message);
    	
    }


    public function UpdateUserAddress(Request $request){

        $roles = [
			
			'nameplace' => 'required|string|min:2',

			'state' => 'required|string|min:2',
			
			'city' => 'required|string|min:2',
			
			'address1' => 'required|string|min:8',

            'postalcode' => 'max:10|min:10'

        ];

        $attributes = [

            'nameplace' => 'نام واحد',

            'state' => 'استان',

            'city' => 'شهر',
			
			'address1' => 'آدرس 1',
			
			'postalcode' => 'کدپستی'

        ];

        $messages = [

            'required' => 'وارد کردن مقدار :attribute اجباری می باشد'

        ];

        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
        

        if($validate->fails()){

            $message['message'] = 'مشکلی در ثبت اطلاعات شما به وجود آمده لطفا خطاهای زیر را بررسی و دوباره امتحان نمایید .';

            $message['class'] = 'alert-warning';

            return redirect()->back()->withErrors($validate)->with('message',$message);

        }

        $user = Auth::user();

        $user->nameplace = $request->get('nameplace');

        $user->state = $request->get('state');

        $user->city = $request->get('city');

        $user->postalcode = $request->get('postalcode');

        $user->address1 = $request->get('address1');

        $user->address2 = $request->get('address2');

        $user->save();
		
		$message['message'] = 'بروزرسانی اطلاعات شما با موفقیت انجام شد .';

        $message['class'] = 'alert-success';

        return redirect()->back()->with('message',$message);
    	
        
    }


    
}

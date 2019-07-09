<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MeRequest;
use App\User;
use App\Activity;
use App\BlogPost;

use Hash;

use Illuminate\Support\Facades\Auth;

use Validator;

use Smsirlaravel;

class ERUController extends Controller
{

     public function index(){


        $activeMenu = 'home';

        $blogviewed = BlogPost::join('blog_files','blog_post.id','=','blog_files.bf_idpost')
            ->where('blog_files.bf_default','=',1)
            ->where('blog_post.BP_VIEWED','>',25)
            ->where('blog_post.BP_DISPLAYSTATUS','=',1)
            ->select('blog_post.*','blog_files.bf_source')
            ->paginate(8);

       

        $now = \Carbon\Carbon::now();

        $result = [];

        for($i = 1;$i<=3;$i++){

            $result[] = \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::now()->addDays($i))->format("%Y-%m-%d");

        }

        return view('index')->with([

            'activeMenu' => $activeMenu,

            'dates' => $result,

            'blogviewed' => $blogviewed,

            'services' => $this->services

        ]);
    }
    public function expertrequest(){

        $activeMenu = 'register';
        $now = \Carbon\Carbon::now();

        $result = [];

        for($i = 1;$i<=3;$i++){

            $result[] = \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::now()->addDays($i))->format("%Y-%m-%d");

        }

    	return view ('expertrequest')->with([

            'activeMenu' => $activeMenu,

            'dates' => $result,

            'services' => $this->services

        ]);
    }

    public function addExpert(Request $request){


        $roles = [

            'name' => 'string|min:3',

            'mobile' => 'numeric',

            'lastname' => 'string|min:5',

            'mobile' => 'numeric|min:11',

            'typerequest' => 'in:' . implode(',', array_keys($this->services)),
			
			'city' => 'in:' . implode(',', array_keys($this->citys)),
			
			'time' => 'in:' . implode(',', array_keys($this->times))
			

        ];

        $attributes = [

            'name' => 'نام',

            'lastname' => 'نام خانوادگی',

            'mobile' => 'موبایل',

            'typerequest' => 'نوع درخواست',
			
			'city' => 'شهر',
			
			'time' => 'زمان مراجعه'

        ];

        $messages = [

            'email' => 'مقدار :attribute باید در فرمت ایمیل باشد.',

            'numeric' => 'مقدار :attribute باید در نوع عددی باشد'

        ];

        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
        
        if($validate->fails()){

            $message['message'] = 'مشکلی در ثبت اطلاعات شما به وجود آمده لطفا خطاهای زیر را بررسی و دوباره امتحان نمایید .';

            $message['class'] = 'alert-warning';

            return redirect()->back()->withErrors($validate)->with('message',$message);
        }


        $r = new MeRequest();
			
		if(!Auth::check()){

            $r->name = $request->get('name');

            $r->lastname = $request->get('lastname');

            $r->mobile = $request->get('mobile');


        }
        else{

            $r->name = Auth::user()->name;

            $r->lastname = Auth::user()->lastname;

            $r->mobile = Auth::user()->mobile;


        }

        $checkregisterlicense = MeRequest::select('me_request.id')
            ->where('me_request.mobile','=',$r->mobile)
            ->where('me_request.status','=','pending')
            ->count();
        if($checkregisterlicense <= 3){

        	$r->typerequest = $request->get('typerequest');

            $r->city = $request->get('city');

            $daterequest = $request->get('date');

            $r->timerequest = $request->get('time');

            $r->address = $request->get('address');  

            $r->status = 0;

            $now = \Carbon\Carbon::now();

            $result = [];

            for($i = 1;$i<=3;$i++){

                $result[] = \Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::now()->addDays($i))->tostring();

            }

            $r->daterequest = $result[$daterequest];
            
            $saved = $r->save();
        
            if(!$saved){

                $message['message'] = 'مشکلی در ثبت اطلاعات شما به وجود آمده لطفا دوباره تلاش کنید';

                $message['class'] = 'alert-warning';

                return redirect()->back()->with('message',$message);
            
            }
            else{

                if(!Auth::check()){

                    $user = User::where('users.mobile','=',$request->get('mobile'))->first();

                    if(is_null($user)){

                        $user = new User();
                
                        $user->name = $request->get('name');
                    
                        $user->mobile = $request->get('mobile');
                            
                        $user->lastname = $request->get('lastname');
                            
                        $user->password = Hash::make('PA'.'EI'.$r->id);

                        $user->points = 150;

                        $user->save();

                    }

                }
                else{

                    $user = Auth::user();

                    $points = Auth::user()->points; 

                    $points = $points + 15;;

                    $user->points = $points;

                    $user->save();

                }

                $r->userid = $user->id;
    			
    			$r->requestid = "RQE" . "01" .  $r->id;
    			
    			$r->save();
                
                $pa = 'PA'.'EI'.$r->id;


                if(!Auth::check()){
                	Smsirlaravel::send(['مشترک عزیز با سلام'.'،'.'درخواست شما با موفقیت ثبت گردید'.'نام کاربری :'.$r->mobile.'و رمز عبور شما :'.$pa.'شما می توانید با ورود به حساب کاربری خود از وضعیت درخواست خود مطلع شوید','درخواست جدیدی در سامانه ثبت شد.'],[$user->mobile,'09120924699']);

                	Smsirlaravel::send([$r->name.' '.$r->lastname.' '.'عزیز'.'به باشگاه مشتریان امداد آی تی خوش آمدید جهت استفاده از امکانات و تخفیفات ویژه به حساب کاربری خود در وب سایت ما مراجعه کنید'.'http://emdadit.com'],[$user->mobile]);
    			}
    			else{
    				
    				Smsirlaravel::send([$r->name.' '.$r->lastname.' '.'عزیز درخواست شما با موفقیت در سامانه ثبت گردید'],[$user->mobile,'09120924699']);
    				
    			}
    			
                $messagesuccessrequest['message'] = 'ثبت اطلاعات شما با موفقیت انجام شد این اطمینان به شما داده میشود که کارشناسان ما با شما در کمترین ممکن زمان تماس بگیرند .';

                $messagesuccessrequest['class'] = 'alert-success';

                $submitstatus['class'] = 'alert-success';

                $validates = $validate->errors();
    			
    		    
                return redirect()->back()->with([
                
                    'messagesuccessrequest' => $messagesuccessrequest,

                    'errorvalidate' => $validates,
        				
        			'requestids' => $r->requestid,
        				
        			'name' => $r->name,
        				
        			'mobile' => $r->mobile,

                    'password' => $pa,

                    'submitstatus' => $submitstatus

                ]);

            }
        }
        else{

            $error['class'] = 'errorregisterlicense';

            return redirect()->back()->with([

                'error' => $error
            ]);

        }

    }
}

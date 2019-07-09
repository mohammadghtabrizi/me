<?php

namespace App\Http\Controllers\admin\expertrequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MeRequest;

class ExpertRequestController extends Controller
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


    public function index(){

    	$expertrequests = MeRequest::select('me_request.*')
    		->paginate(50);


    	return view('admin/expertrequest/expert-request-dashboard')->with([

    		'expertrequests' => $expertrequests,

    		'statuses' => $this->statuses,

    		'citys' => $this->citys,

    		

    	]);
    }

    public function expertsend($id){

    	$expertrequest = MeRequest::find($id);

    	$expertrequest->status = 1;

    	$expertrequest->save();

    	return redirect()->back();
    }

    public function expertfinishjob($id){

    	$expertrequest = MeRequest::find($id);

    	$expertrequest->status = 2;

    	$expertrequest->save();

    	return redirect()->back();
    }

    public function expertdelete($id){

    	$expertrequest = MeRequest::find($id);

    	$expertrequest->status = 3;

    	$expertrequest->save();

    	return redirect()->back();

    }
}

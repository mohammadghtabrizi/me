<?php

namespace App\Http\Controllers\main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopMainController extends Controller
{
    public function index(){

    	$activeMenu = 'shop';

    	return view('shop\shop-main')->with([

    		'activeMenu' => $activeMenu

    	]);
    }
}

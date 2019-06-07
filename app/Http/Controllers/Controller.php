<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	protected $services = [

        1 => 'تعمیر پرینتر ، اسکتر ، کپی ، پلاتر',

        2 => 'شارژ کارتریج',

        3 => 'تعمیر کامپیوتر',

        4 => 'تعمیر لپ تاپ',

        5 => 'نصب و راه اندازی کامپیوتر و لپتاپ',

        6 => 'نصب و راه اندازی ماشین های اداری',

        7 => 'رفع ایرادنرم افزاری',

        8 => 'ویروس یابی'

    ];
	
	protected $citys = [
		
		1 => 'تهران',
		
		2 => 'تبریز'
		
		
	];
	
	
	protected $times = [
		
		1 => 'ساعت 9 صبح ال 12 ظهر',
		
		2 => 'ساعت 12 ظهر تا 16عصر',
		
		3 => 'ساعت 16 الی 19 عصر'
		
	];

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

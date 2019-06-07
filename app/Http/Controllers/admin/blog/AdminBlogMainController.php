<?php

namespace App\Http\Controllers\admin\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BlogPost;
use App\BlogCategory;
use App\Users;

class AdminBlogMainController extends Controller
{

	protected $statuses = [

        '0' => [

            'color' => 'col-amber',

            'title' => 'درحال بررسی'

        ],

        '1' => [

            'color' => 'col-green',

            'title' => 'درحال نمایش'

        ],

        '2' => [

            'color' => 'col-red',

            'title' => 'مسدود شده'

        ],

    ];


    public function index(){

    	$blogposts = BlogPost::join('blog_category','blog_post.BP_CATID','=','blog_category.id')
    		->join('users','blog_post.BP_USERID','=','users.id')
    		->orderBy('blog_post.CREATED_AT','desc')
    		->select('blog_post.id','blog_post.BP_TITLE','blog_post.BP_VIEWED','blog_post.BP_DISPLAYSTATUS','blog_category.BC_NAME','users.name','users.lastname')
    		->paginate(25);

    	$blogcategorys = BlogCategory::select('blog_category.BC_NAME','blog_category.id')
    		->where('BC_SUBCATEGORYID','=',0)
    		->get();


    	return view('admin/blog/posts-show')->with([

    		'blogposts' => $blogposts,

    		'statuses' => $this->statuses,

    		'blogcategorys' => $blogcategorys
    	]);
    }

    public function searchbycategoryblog(Request $request){

    	$category = $request->get('category');

    	$blogposts = BlogPost::join('blog_category','blog_post.BP_CATID','=','blog_category.id')
    		->join('users','blog_post.BP_USERID','=','users.id')
    		->orderBy('blog_post.CREATED_AT','desc')
    		->select('blog_post.id','blog_post.BP_TITLE','blog_post.BP_VIEWED','blog_post.BP_DISPLAYSTATUS','blog_category.BC_NAME','users.name','users.lastname')
    		->where('blog_category.BC_NAME','=',$category)
    		->paginate(25);
    		
    	$blogcategorys = BlogCategory::select('blog_category.BC_NAME','blog_category.id')
    		->where('BC_SUBCATEGORYID','=',0)
    		->get();

    	return view('admin/blog/posts-show')->with([

    		'blogposts' => $blogposts,

    		'statuses' => $this->statuses,

    		'blogcategorys' => $blogcategorys
    	]);
    }
}

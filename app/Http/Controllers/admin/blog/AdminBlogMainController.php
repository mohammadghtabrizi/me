<?php

namespace App\Http\Controllers\admin\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BlogPost;
use App\BlogCategory;
use App\Users;
use App\BlogFile;
use App\BlogTag;

use File;

use Validator;

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

    public function blockpost(Request $request,$id){


        $blogpostsearch = BlogPost::find($id);

        $blogpostsearch->BP_DISPLAYSTATUS = 2;

        $blogpostsearch->save();
        
        return redirect()->back();


    }

    public function approvepost(Request $request,$id){

        $blogpostsearch = BlogPost::find($id);

        $blogpostsearch->BP_DISPLAYSTATUS = 1;

        $blogpostsearch->save();
        
        return redirect()->back();
    }

    public function deletepost(Request $request,$id){

        $blogpostsearch = BlogPost::find($id);

        $blogpostsearch->BP_DISPLAYSTATUS = 3;

        $blogpostsearch->save();
        
        return redirect()->back();
    }


    public function indexcategorys(){

        $categorys = BlogCategory::select('blog_category.*')
            ->orderBy('blog_category.CREATED_AT','desc')
            ->paginate(25);

        return view('admin/blog/categorys-show')->with([

            'statuses' => $this->statuses,

            'categorys' => $categorys


        ]);
    }

    public function deletecategory(Request $request,$id){

        $blogcategorysearch = BlogCategory::find($id);

        $blogcategorysearch->BC_DISPLAYSTATUS = 3;

        $blogcategorysearch->save();
        
        return redirect()->back();
    }

    public function blockcategory(Request $request,$id){

        $blogcategorysearch = BlogCategory::find($id);

        $blogcategorysearch->BC_DISPLAYSTATUS = 2;

        $blogcategorysearch->save();
        
        return redirect()->back();
    }

    public function approvecategory(Request $request,$id){

        $blogcategorysearch = BlogCategory::find($id);

        $blogcategorysearch->BC_DISPLAYSTATUS = 1;

        $blogcategorysearch->save();
        
        return redirect()->back();
    }

    public function addcategory(){

        return view('admin/blog/category-add');
    }

    public function addcategoryact(Request $request){


        $newcategory = new BlogCategory();

        $newcategory->BC_NAME = $request->get('postcategory');

        $newcategory->save();

        return redirect()->back();
    }

    public function addpost (){

        $categorys = BlogCategory::select('blog_category.id','blog_category.BC_NAME')
            ->where('blog_category.BC_SUBCATEGORYID','=',0)
            ->get();

        $tags = BlogTag::pluck('BT_VALUE','id')->toArray();

        return view('admin/blog/post-add')->with([

            'categorys' => $categorys,

            'tags' => $tags

        ]);

        
    }

    public function addpostact(Request $request){

        $rules = [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];

        $attributes = [

            'image' => 'تصویر'

        ];

        $validator = Validator::make($request->all(),$rules,[],$attributes);

        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator);

        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/post-images/');
            dd($destinationPath.$name);
            $image->move($destinationPath, $name);  
        }

        $newfile = new BlogFile();

        $newpost = new BlogPost();

        $newpost->BP_TITLE = $request->get('posttitre');
        $newpost->BP_DESS = $request->get('postlessdesc');
        $newpost->BP_DESL = $request->get('postlongdesc');
        $newpost->BP_CATID = $request->get('category');
        $newpost->BP_USERID = 17;
        $newpost->BP_METATAG_DESCRIPTION = $request->get('metatagdescription');
        $newpost->BP_TITLE_PAGE = $request->get('titlepage');
        $newpost->BP_TAG_H1 = $request->get('h1');

        $newpost->save();

        $newfile->bf_idpost = $newpost->id; 
        $newfile->bf_source = $name;
        $newfile->bf_default = 1;

        $newfile->save();


        return redirect()->back();

    }

    public function editpost($id){

        $post = BlogPost::join('blog_category','blog_post.BP_CATID','=','blog_category.id')
            ->select('blog_post.*','blog_category.BC_NAME','blog_category.id as idcategory')
            ->where('blog_post.id','=',$id)
            ->first();

        $files = BlogFile::select('blog_files.*')
            ->where('blog_files.bf_idpost','=',$post->id)
            ->first();

        $categorys = BlogCategory::select('blog_category.id','blog_category.BC_NAME')
            ->where('blog_category.BC_SUBCATEGORYID','=',0)
            ->get();

        return view('admin\blog\post-edit')->with([

            'post' => $post,

            'categorys' => $categorys,

            'files' => $files
        ]);
    }

    public function editpostact(Request $request,$id){


        $newfile = new BlogFile();

        $post = BlogPost::find($id);

        $post->BP_METATAG_DESCRIPTION = $request->get('metatagdescription');
        $post->BP_TITLE_PAGE = $request->get('titlepage');
        $post->BP_TAG_H1 = $request->get('h1');
        $post->BP_TITLE = $request->get('posttitre');
        $post->BP_DESS = $request->get('postlessdesc');
        $post->BP_DESL = $request->get('postlongdesc');
        $post->BP_CATID = $request->get('category');

        $post->save();

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/post-images');
            $image->move($destinationPath, $name);  
        }

        $newfile->bf_idpost = $post->id; 
        $newfile->bf_source = $name;
        $newfile->bf_default = 1;

        $newfile->save();
        

        return redirect()->back();
    }

    public function deletepostpicture($id){

        $file = BlogFile::where('blog_files.id','=',$id)
            ->select(['id','bf_source'])
            ->first();

        abort_if(is_null($file),404);

        if(file_exists('images/post-images/'.$file->bf_source)){

            unlink('images/post-images/'.$file->bf_source);

        }

        $file->delete();

        return redirect()->back();
    }

    public function indextags(){

        $tags = BlogTag::select('blog_tag.*')
            ->paginate(25);

        return view('admin/blog/tags-show')->with([

            'tags' => $tags

        ]);
    }

    public function addtag(){

        return view('admin/blog/tag-add');
    }

    public function addtagact(Request $request){

        $newtag = new BlogTag();

        $newtag->BT_VALUE = $request->get('posttag');

        $newtag->save();

        return redirect()->back();
    }

    public function deletetag($id){

        $deletetag = BlogTag::find($id)->delete();

        return redirect()->back();

    }

    public function edittag($id){

        $edittag = BlogTag::find($id);

        return view('admin/blog/tag-edit')->with([

            'edittag' => $edittag
        ]);
    }

    public function edittagact(Request $request,$id){

        $edittag = BlogTag::find($id);

        $edittag->BT_VALUE = $request->get('posttag');

        $edittag->save();

        return redirect()->route('admin_tags_blog_index');

    }
}

<?php

namespace App\Http\Controllers\admin\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImages;
use App\ProductCategory;
use App\ProductBrands;

use Validator;

class ShopAdminMainController extends Controller
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

    public function productlist(){

    	$products = Product::join('product_images','product.id','=','product_images.pro_images_product_id')
    		->select('product.*','product.id as productid','product_images.*','product_images.id as imageid')
    		->where('product.pro_status','<=','2')
    		->where('product_images.pro_image_first_view','=',1)
    		->paginate(25);

    	$categorys1 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','=',NULL)
    		->get();

    	$categorys2 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','<>',NULL)
    		->get();


    	$activemenu = 'shopcategory';

        $activesubmenu = 'productlist';

    	return view('admin\shop\product-list')->with([

    		'products' => $products,

    		'categorys1' => $categorys1,

    		'categorys2' => $categorys2,

    		'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu
    	]);
    }

    public function productlistsearchbycategory(Request $request){

    	$category = ProductCategory::select('product_category.id')
    		->where('product_category.pro_cat_name','=',$request->get('category'))
    		->first();

    	$products = Product::join('product_images','product.id','=','product_images.pro_images_product_id')
    		->select('product.*','product.id as productid','product_images.*','product_images.id as imageid')
    		->where('product_images.pro_image_first_view','=',1)
    		->where('product.pro_status','<=','2')
    		->where('product.pro_categoryid','=',$category->id)
    		->paginate(25);

    	$categorys1 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','=',NULL)
    		->get();

    	$categorys2 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','<>',NULL)
    		->get();

    	$activemenu = 'shopcategory';

        $activesubmenu = 'productlist';

    	return view('admin\shop\product-list')->with([

    		'products' => $products,

    		'categorys1' => $categorys1,

    		'categorys2' => $categorys2,

    		'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu
    	]);
    }

    public function addproduct(){

    	$activemenu = 'shopcategory';

        $activesubmenu = 'productlist';

        $categorys1 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','=',NULL)
    		->get();

    	$categorys2 = ProductCategory::select('product_category.*')
    		->where('product_category.pro_cat_status','=',1)
    		->where('product_category.pro_topcat1_id','<>',NULL)
    		->where('product_category.pro_topcat2_id','<>',NULL)
    		->get();

    	$brands = ProductBrands::select('product_brands.*')
    		->get();

    	return view('admin\shop\product-add')->with([

    		'categorys1' => $categorys1,

    		'categorys2' => $categorys2,

    		'brands' => $brands,

    		'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu
    	]);

    }

   	public function addproductact(Request $request){

   		$product = new Product();

        $product->pro_name = $request->get('productname');
        $product->pro_detail = $request->get('productdetail');
        $product->pro_review = $request->get('productreview');
        $product->pro_price = $request->get('productprice');
        $product->pro_inventory = $request->get('productinventory');
        $product->pro_categoryid = $request->get('productcategory');
        $product->pro_brands_id = $request->get('brand');
        $product->pro_points = 5;

        $product->save();

   		if ($request->hasFile('image1')) {
            $image1 = $request->file('image1');
            $name1 = time().'1'.'.'.$image1->getClientOriginalExtension();
            $destinationPath1 = public_path('/images/shop/product-picture/');
            $image1->move($destinationPath1, $name1); 

            $saveimage1 = new ProductImages();

        	$saveimage1->pro_images_product_id = $product->id;
        	$saveimage1->pro_image_source = $name1;
        	$saveimage1->pro_image_first_view = 1;

        	$saveimage1->save(); 
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $name2 = time().'2'.'.'.$image2->getClientOriginalExtension();
            $destinationPath2 = public_path('/images/shop/product-picture/');
            $image2->move($destinationPath2, $name2);

            $saveimage2 = new ProductImages();

        	$saveimage2->pro_images_product_id = $product->id;
        	$saveimage2->pro_image_source = $name2;

        	$saveimage2->save();

        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $name3 = time().'3'.'.'.$image3->getClientOriginalExtension();
            $destinationPath3 = public_path('/images/shop/product-picture/');
            $image3->move($destinationPath3, $name3);

            $saveimage3 = new ProductImages();

        	$saveimage3->pro_images_product_id = $product->id;
        	$saveimage3->pro_image_source = $name3;  

        	$saveimage3->save();
        }

        if ($request->hasFile('image4')) {
            $image4 = $request->file('image4');
            $name4 = time().'4'.'.'.$image4->getClientOriginalExtension();
            $destinationPath4 = public_path('/images/shop/product-picture/');
            $image4->move($destinationPath4, $name4); 

            $saveimage4 = new ProductImages();

        	$saveimage4->pro_images_product_id = $product->id;
        	$saveimage4->pro_image_source = $name4; 

        	$saveimage4->save();
        }

        return redirect()->back();



   	}

    public function editproduct($id){

        $activemenu = 'shopcategory';

        $activesubmenu = 'productlist';

        $categorys1 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

        $categorys2 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','<>',NULL)
            ->get();

        $brands = ProductBrands::select('product_brands.*')
            ->get();

        $product = Product::join('product_category','product.pro_categoryid','=','product_category.id')
            ->join('product_brands','product.pro_brands_id','=','product_brands.id')
            ->select('product.*','product.id as productid','product_category.*','product_category.id as categoryid','product_brands.*','product_brands.id as brandsid')
            ->where('product.id','=',$id)
            ->first();

        return view('admin\shop\product-edit')->with([

            'categorys1' => $categorys1,

            'categorys2' => $categorys2,

            'brands' => $brands,

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu,

            'product' => $product

        ]);

    }

    public function editproductact(Request $request,$id){

        $product = Product::find($id);

        $product->pro_name = $request->get('productname');
        $product->pro_detail = $request->get('productdetail');
        $product->pro_review = $request->get('productreview');
        $product->pro_price = $request->get('productprice');
        $product->pro_inventory = $request->get('productinventory');
        $product->pro_categoryid = $request->get('productcategory');
        $product->pro_brands_id = $request->get('brand');
    
        $product->save();

        return redirect()->route('product_list_show');
    }

    public function blockproduct($id){

    	$product = Product::find($id);

    	$product->pro_status = 2;

    	$product->save();

    	return redirect()->back();
    }

    public function approveproduct($id){

    	$product = Product::find($id);

    	$product->pro_status = 1;

    	$product->save();

    	return redirect()->back();
    }

    public function deleteproduct($id){

    	$product = Product::find($id);

    	$product->pro_status = 3;

    	$product->save();

    	return redirect()->back();
    }

    public function categorylist(){

        $activemenu = 'shopcategory';

        $activesubmenu = 'categorylist';

        $categorys0 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','<=',2)
            ->where('product_category.pro_topcat1_id','=',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

        $categorys1 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','<=',2)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

        $categorys2 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','<=',2)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','<>',NULL)
            ->get();

        $categorys = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','<=','2')
            ->get();

        return view('admin\shop\category-list')->with([

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu,

            'categorys0' => $categorys0,

            'categorys1' => $categorys1,

            'categorys2' => $categorys2,

            'statuses' => $this->statuses,

        ]);
    }

    public function addcategoryproduct($id){

        $activemenu = 'shopcategory';

        $activesubmenu = 'categorylist';

        $cats0 = NULL;
        $cats1 = NULL;

        if($id == 2){

            $cats0 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','=',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

            $cats1 = NULL;

        }
        elseif ($id == 3) {

            $cats0 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','=',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();
            
            $cats1 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

        }

        return view('admin\shop\category-add')->with([

            'cats0' => $cats0,

            'cats1' => $cats1,

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu,


        ]);

    }

    public function addcategoryproductact(Request $request){

        $cat0 = $request->get('categoryselected0');
        $cat1 = $request->get('categoryselected1');
        $cat2 = $request->get('categoryselected2');

        $category = new ProductCategory();

        if(is_null($cat1) && is_null($cat2)){

            if(!is_null($cat0)){

                $category->pro_cat_name = $cat0;
                $category->save();

                return redirect()->route('category_list_show');
            }
            
        }

        elseif (!is_null($cat0) && !is_null($cat1) && is_null($cat2)) {

            $category->pro_topcat1_id = $cat1;
            $category->pro_cat_name = $cat0;
            $category->save();

            return redirect()->route('category_list_show');
        }

        elseif (!is_null($cat0) && !is_null($cat1) && !is_null($cat2)) {

            $category->pro_topcat1_id = $cat1;
            $category->pro_topcat2_id = $cat2;
            $category->pro_cat_name = $cat0;
            $category->save();

            return redirect()->route('category_list_show');
        }

        return redirect()->back();
    }

    public function blockproductcategory($id){

        $productcategory = ProductCategory::find($id);

        $productcategory->pro_cat_status = 2;

        $productcategory->save();

        return redirect()->back();
    }

    public function approveproductcategory($id){

        $productcategory = ProductCategory::find($id);

        $productcategory->pro_cat_status = 1;

        $productcategory->save();

        return redirect()->back();
    }

    public function deleteproductcategory($id){

        $productcategory = ProductCategory::find($id);

        $productcategory->pro_cat_status = 3;

        $productcategory->save();

        return redirect()->back();
    }

    public function brandslist(){


        $activemenu = 'shopcategory';

        $activesubmenu = 'brandslist';

        $brands = ProductBrands::select('product_brands.*')
            ->get();

        return view('admin\shop\brands-list')->with([

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu,

            'brands' => $brands

        ]);

    }

    public function addbrand(){


        $activemenu = 'shopcategory';

        $activesubmenu = 'brandslist';


        return view('admin\shop\brand-add')->with([

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu

        ]);

    }

    public function addbrandact(Request $request){

        $rules = [

            'brandimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];

        $attributes = [

            'brandimage' => 'تصویر'

        ];

        $validator = Validator::make($request->all(),$rules,[],$attributes);

        if($validator->fails()){
            
            return redirect()->back()->withErrors($validator);

        }

        $brandname = $request->get('brandname');

        if ($request->hasFile('brandimage')) {
            $brandimage = $request->file('brandimage');
            $name = time().'.'.$brandimage->getClientOriginalExtension();
            $destinationPath = public_path('/images/shop/brands/');
            $brandimage->move($destinationPath, $name); 

            $savebrand = new ProductBrands();

            $savebrand->pro_brands_name = $brandname;
            $savebrand->pro_brands_images_source = $name;

            $savebrand->save();

            return redirect()->route('brand_list_show'); 
        }

        return redirect()->back();
        
    }

    public function propertylist(){

        $activemenu = 'shopcategory';

        $activesubmenu = 'propertylist';

        $categorys1 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','=',NULL)
            ->get();

        $categorys2 = ProductCategory::select('product_category.*')
            ->where('product_category.pro_cat_status','=',1)
            ->where('product_category.pro_topcat1_id','<>',NULL)
            ->where('product_category.pro_topcat2_id','<>',NULL)
            ->get();


        return view('admin\shop\property-list')->with([

            'categorys1' => $categorys1,

            'categorys2' => $categorys2,

            'activemenu' => $activemenu,

            'activesubmenu' => $activesubmenu
        ]);

    }
}

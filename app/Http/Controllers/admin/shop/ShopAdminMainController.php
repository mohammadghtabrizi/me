<?php

namespace App\Http\Controllers\admin\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\ProductImages;
use App\ProductCategory;
use App\ProductBrands;

class ShopAdminMainController extends Controller
{
    public function productlist(){

    	$products = Product::join('product_images','product.id','=','product_images.pro_images_product_id')
    		->select('product.*','product_images.*','product_images.id as imageid')
    		->where('product.pro_status','<=','2')
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
    		->select('product.*','product_images.*','product_images.id as imageid')
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

    public function editproduct($id){

    	

    	return redirect()->back();
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/* Admin */
Route::group(['prefix' => 'admin'],function(){
	
	Route::group(['prefix' => '/','middleware' => ['adminIsAuth']],function(){

		/*Profile Section*/

		Route::get('/','admin\DashboardController@index')->name('admin_dashboard');

		Route::get('/edit_profile_view','admin\DashboardController@editprofileview')->name('edit_profile_view');

		Route::post('/edit_profile_security','admin\DashboardController@editprofilesecurity')->name('edit_profile_security');

		Route::post('/edit_profile_account','admin\DashboardController@editprofileaccount')->name('edit_profile_account');

		/*Profile Section*/



		/*Expert Request*/

		Route::group(['prefix' => 'expertrequest'],function(){

			Route::get('/','admin\expertrequest\ExpertRequestController@index')->name('admin_expert_request_index');

			Route::get('/expert_send/{id}','admin\expertrequest\ExpertRequestController@expertsend')->name('expert_request_send');

			Route::get('/expert_delete/{id}','admin\expertrequest\ExpertRequestController@expertdelete')->name('expert_request_delete');

			Route::get('/expert_finish_job/{id}','admin\expertrequest\ExpertRequestController@expertfinishjob')->name('expert_request_finish_job');

		});

		/*Expert Request*/



		/*Admin Blog Section*/

		Route::group(['prefix' => 'blog'],function(){

			Route::get('/','admin\blog\AdminBlogMainController@index')->name('admin_blog_index');

			Route::post('/','admin\blog\AdminBlogMainController@searchbycategoryblog')->name('search_by_category_blog');

			Route::get('/block_post/{id}','admin\blog\AdminBlogMainController@blockpost')->name('block_post');

			Route::get('/approve_post/{id}','admin\blog\AdminBlogMainController@approvepost')->name('approve_post');

			Route::get('/delete_post/{id}','admin\blog\AdminBlogMainController@deletepost')->name('delete_post');

			Route::get('/categorys_blog_index','admin\blog\AdminBlogMainController@indexcategorys')->name('admin_categorys_blog_index');

			Route::get('/approve_category/{id}','admin\blog\AdminBlogMainController@approvecategory')->name('approve_category');

			Route::get('/block_category/{id}','admin\blog\AdminBlogMainController@blockcategory')->name('block_category');

			Route::get('/delete_category/{id}','admin\blog\AdminBlogMainController@deletecategory')->name('delete_category');

			Route::get('/add_category','admin\blog\AdminBlogMainController@addcategory')->name('add_category_post');

			Route::post('/add_category','admin\blog\AdminBlogMainController@addcategoryact')->name('add_category_post_act');

			Route::get('/add_post','admin\blog\AdminBlogMainController@addpost')->name('add_post');

			Route::post('/add_post','admin\blog\AdminBlogMainController@addpostact')->name('add_post_act');

			Route::get('/edit_post/{id}','admin\blog\AdminBlogMainController@editpost')->name('edit_post');

			Route::post('/edit_post_act/{id}','admin\blog\AdminBlogMainController@editpostact')->name('edit_post_act');

			Route::get('/delete_post_picture/{id}','admin\blog\AdminBlogMainController@deletepostpicture')->name('delete_post_picture');

			Route::get('/admin_tags_blog_index','admin\blog\AdminBlogMainController@indextags')->name('admin_tags_blog_index');

			Route::get('/add_tag_post','admin\blog\AdminBlogMainController@addtag')->name('add_tag_post');

			Route::post('/add_tag_post_act','admin\blog\AdminBlogMainController@addtagact')->name('add_tag_post_act');

			Route::get('/delete_tag/{id}','admin\blog\AdminBlogMainController@deletetag')->name('delete_tag');

			Route::get('/edit_tag/{id}','admin\blog\AdminBlogMainController@edittag')->name('edit_tag');

			Route::post('/edit_tag_act/{id}','admin\blog\AdminBlogMainController@edittagact')->name('edit_tag_act');
		});

		/*Admin Blog Section*/


		/*Admin Shop Section*/
		Route::group(['prefix' => 'shop'],function(){

			/*Product Section*/

			Route::get('/product_list','admin\shop\ShopAdminMainController@productlist')->name('product_list_show');

			Route::get('/block_product/{id}','admin\shop\ShopAdminMainController@blockproduct')->name('block_product');

			Route::get('/approve_product/{id}','admin\shop\ShopAdminMainController@approveproduct')->name('approve_product');

			Route::get('/edit_product/{id}','admin\shop\ShopAdminMainController@editproduct')->name('edit_product');

			Route::post('/edit_product_act/{id}','admin\shop\ShopAdminMainController@editproductact')->name('edit_product_act');

			Route::get('/delete_product/{id}','admin\shop\ShopAdminMainController@deleteproduct')->name('delete_product');

			Route::post('/product_list_search_by_category','admin\shop\ShopAdminMainController@productlistsearchbycategory')->name('product_list_search_by_category');

			Route::get('/add_product','admin\shop\ShopAdminMainController@addproduct')->name('add_product');

			Route::post('/add_product_act','admin\shop\ShopAdminMainController@addproductact')->name('add_product_act');

			/*Product Section*/

			/*Categorys Section*/

			Route::get('/category_list','admin\shop\ShopAdminMainController@categorylist')->name('category_list_show');

			Route::get('/add_category_product/{id}','admin\shop\ShopAdminMainController@addcategoryproduct')->name('add_category_product');

			Route::post('/add_category_product_act','admin\shop\ShopAdminMainController@addcategoryproductact')->name('add_category_product_act');
			
			Route::get('/block_product_category/{id}','admin\shop\ShopAdminMainController@blockproductcategory')->name('block_product_category');

			Route::get('/approve_product_category/{id}','admin\shop\ShopAdminMainController@approveproductcategory')->name('approve_product_category');

			Route::get('/edit_product_category/{id}','admin\shop\ShopAdminMainController@editproduct')->name('edit_product_category');

			Route::post('/edit_product_category_act/{id}','admin\shop\ShopAdminMainController@editproductact')->name('edit_product_category_act');

			Route::get('/delete_product_category/{id}','admin\shop\ShopAdminMainController@deleteproductcategory')->name('delete_product_category');

			/*Categorys Section*/

			/*Brand Section*/

			Route::get('/brand_list_show','admin\shop\ShopAdminMainController@brandslist')->name('brand_list_show');

			Route::get('/add_brand','admin\shop\ShopAdminMainController@addbrand')->name('add_brand');

			Route::post('/add_brand_act','admin\shop\ShopAdminMainController@addbrandact')->name('add_brand_act');

			/*Brand Section*/


			/*Property Section*/

			Route::get('/property_list_show','admin\shop\ShopAdminMainController@propertylist')->name('property_list_show');

			/*Property Section*/
		});

		/*Admin Shop Section*/
		
		
	});



	Route::group(['prefix' => 'auth'],function(){

		Route::get('/login','admin\auth\LoginController@index')->name('admin_login_page');

		Route::post('/login','admin\auth\LoginController@login')->name('admin_login_act');

	});


});





/* index */ 
Route::get('/', 'ERUController@index')->name('index');

Route::get('/comingsoon','main\IndexController@comingsoon')->name('comingsoon');

Route::get('/contactus','main\IndexController@contactus')->name('contactus');

Route::post('/newsletter','main\IndexController@newsletter')->name('newsletter_user_front');

Route::get('/aboutus','main\IndexController@aboutusview')->name('aboutus_user_view');




/*Expert Request*/
Route::get('expertrequest','ERUController@expertrequest')->name('expertrequest');

Route::post('store_expertrequest','ERUController@addExpert')->name('store_expertrequest');




/*Shop Main*/
Route::get('shop','main\ShopMainController@index')->name('shop_main');






/* Blog */
Route::group(['prefix' => 'blog'],function(){

	Route::get('/','blog\users\BlogMainController@indexblog')->name('blog_main');

	Route::get('/tags/{id}/{tag?}','blog\users\BlogMainController@blogtags')->name('blog_tags');

	Route::get('/post/{id}/{slug?}','blog\users\BlogMainController@postshow')->name('show_post');

	Route::get('/category/{id}/{slug?}','blog\users\BlogMainController@category')->name('list_category_posts');

	Route::post('/','blog\users\BlogMainController@blogsearch')->name('blog_search');

	Route::post('/addcomment','blog\users\BlogMainController@addComment')->name('store_comment');

	Route::post('/addreplycomment','blog\users\BlogMainController@addreplycomment')->name('add_reply_comment');

});

/*Comments*/

Route::post('store_comment','blog\users\BlogMainController@addcomment')->name('store_comment');

/* Users Dashboard */
Route::group(['prefix' => 'dashboard'],function(){

	Route::group(['prefix' => '/','middleware' => ['userIsAuth']],function(){

		Route::get('/','Auth\Dashboard\MainDashboardController@Homeprofile')->name('dashboard_users');

		Route::post('/update_user_profile','Auth\Dashboard\MainDashboardController@UpdateUserProfile')->name('update_user_profile');

		Route::get('/my_request','Auth\Dashboard\MainDashboardController@showmyrequest')->name('show_my_request');

		Route::get('/my_address','Auth\Dashboard\MainDashboardController@showmyaddress')->name('show_my_address');

		Route::post('/update_user_address','Auth\Dashboard\MainDashboardController@UpdateUserAddress')->name('update_user_address');


		
		
	});

	Route::group(['prefix' => 'auth'],function(){

		Route::post('/login','Auth\LoginController@login')->name('login_front_end_user');

		Route::get('/login','Auth\LoginController@index')->name('login_front_end_user_view');

		Route::get('/logout','Auth\LogoutController@Logout')->name('logout_front_end_user');

		Route::get('/register','Auth\RegisterController@registerview')->name('register_view_user');

		Route::post('/register','Auth\RegisterController@registeradd')->name('register_add_user');

	});

});

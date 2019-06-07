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



		/*Blog Section*/

		Route::group(['prefix' => 'blog'],function(){

			Route::get('/','admin\blog\AdminBlogMainController@index')->name('admin_blog_index');

			Route::post('/','admin\blog\AdminBlogMainController@searchbycategoryblog')->name('search_by_category_blog');

			Route::get('/block_post/{id}','admin\blog\AdminBlogMainController@blockpost')->name('block_post');

			Route::get('/approve_post/{id}','admin\blog\AdminBlogMainController@approvepost')->name('approve_post');

			Route::get('/delete_post/{id}','admin\blog\AdminBlogMainController@deletepost')->name('delete_post');

			Route::get('/categorys_blog_index','admin\blog\AdminBlogMainController@indexcategorys')->name('admin_categorys_blog_index');
		});

		/*Blog Section*/
		
		
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




/*Comments*/

Route::post('store_comment','blog\users\BlogMainController@addcomment')->name('store_comment');




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

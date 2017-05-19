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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','WelcomeController@index');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);

		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);

		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);

		Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);

		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);

		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
	});
});

Auth::routes();
//controller viết route cho user


Route::get('/home', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@trangchu');
// phần theme giao diện

// MENU
//menu cấp 1
Route::get('san-pham-nu',['as'=>'sanpham','uses'=>'HomeController@sanphamnu']);
Route::get('san-pham-nam',['as'=>'sanpham','uses'=>'HomeController@sanphamnam']);
//sản phẩm con - menu cấp 2
Route::get('san-pham/{alias}',['as'=>'sanpham','uses'=>'HomeController@sanphamcon']);

Route::get('san-pham-moi-nhat',['as'=>'sanpham','uses'=>'HomeController@sanphammoinhat']);
Route::get('san-pham-re-nhat',['as'=>'sanpham','uses'=>'HomeController@sanphamrenhat']);
// END MENU

//  sản phẩm
Route::get('thong-tin-san-pham/{id}/{tensp}',['as'=>'thongtinsanpham','uses'=>'HomeController@thongtinsanpham']);// tham số tensp ko tồn tại nhưng để thỏa mãn url ở chỗ home
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');
Route::get('admin/logout','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){

	Route::group(['prefix'=>'overview'],function (){
		//admin/overview/statistic
		Route::get('statistic','StatisticController@getStatistic');
	});

	Route::group(['prefix'=>'bill'],function (){
		//admin/bill/list
		Route::get('list','BillController@getList');

		Route::get('edit/{bill_id}','BillController@getEdit');

		Route::post('edit/{bill_id}','BillController@postEdit');

		Route::get('add','BillController@getAdd');

		Route::post('add','BillController@postAdd');

		Route::get('delete/{bill_id}','BillController@getDelete');
	});

	Route::group(['prefix'=>'billdetail'],function (){

		Route::get('list','BillDetailController@getList');

		Route::get('edit/{bill_detail_id}','BillDetailController@getEdit');

		Route::post('edit/{bill_detail_id}','BillDetailController@postEdit');

		Route::get('add','BillDetailController@getAdd');

		Route::post('add','BillDetailController@postAdd');

		Route::get('delete/{bill_detail_id}','BillDetailController@getDelete');
	});

	Route::group(['prefix'=>'product'],function (){
		//admin/product/list
		Route::get('list','ProductController@getList');

		Route::get('edit/{product_id}','ProductController@getEdit');

		Route::post('edit/{product_id}','ProductController@postEdit');

		Route::get('add','ProductController@getAdd');

		Route::post('add','ProductController@postAdd');

		Route::get('delete/{product_id}','ProductController@getDelete');
	});

	Route::group(['prefix'=>'producttype'],function (){
		//admin/producttype/list
		Route::get('list','ProductTypeController@getList');

		Route::get('edit/{type_product_id}','ProductTypeController@getEdit');

		Route::post('edit/{type_product_id}','ProductTypeController@postEdit');

		Route::get('add','ProductTypeController@getAdd');

		Route::post('add','ProductTypeController@postAdd');

		Route::get('delete/{type_product_id}','ProductTypeController@getDelete');
	});

	Route::group(['prefix'=>'customer'],function (){
		//admin/customer/list
		Route::get('list','CustomerController@getList');

		Route::get('edit/{customer_id}','CustomerController@getEdit');

		Route::post('edit/{customer_id}','CustomerController@postEdit');

		Route::get('add','CustomerController@getAdd');

		Route::post('add','CustomerController@postAdd');

		Route::get('delete/{customer_id}','CustomerController@getDelete');
	});

	Route::group(['prefix'=>'news'],function (){

		Route::get('list','NewsController@getList');

		Route::get('edit/{news_id}','NewsController@getEdit');

		Route::post('edit/{news_id}','NewsController@postEdit');

		Route::get('add','NewsController@getAdd');

		Route::post('add','NewsController@postAdd');

		Route::get('delete/{news_id}','NewsController@getDelete');
	});

	Route::group(['prefix'=>'user'],function (){
		//admin/users/them
		Route::get('list','UserController@getList');

		Route::get('edit/{user_id}','UserController@getEdit');

		Route::post('edit/{user_id}','UserController@postEdit');

		Route::get('add','UserController@getAdd');

		Route::post('add','UserController@postAdd');

		Route::get('delete/{user_id}','UserController@getDelete');
	});

	Route::group(['prefix'=>'slide'],function (){
		//admin/slide/add
		Route::get('list','SlideController@getList');

		Route::get('edit/{slide_id}','SlideController@getEdit');

		Route::post('edit/{slide_id}','SlideController@postEdit');

		Route::get('add','SlideController@getAdd');

		Route::post('add','SlideController@postAdd');

		Route::get('delete/{slide_id}','SlideController@getDelete');
	});
    Route::group(['statistics_revenue'=>''],function (){
        //admin/slide/add
        Route::get('index','StatisticsRevenueController@index')->name('statistics.revenue.index');
    });
});

Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'typeproduct',
	'uses'=>'PageController@getTypeProduct'
]);

Route::get('chi-tiet-san-pham/{product_id}',[
	'as'=>'detailproduct',
	'uses'=>'PageController@getDetail'
]);

Route::get('lien-he',[
	'as'=>'contact',
	'uses'=>'PageController@getContact'
]);

Route::get('gioi-thieu',[
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);

Route::group(['prefix'=>'cart'],function (){
	Route::get('add/{product_id}',[
		'as'=>'addtocart',
		'uses'=>'PageController@getAddtoCart'
	]);
	
	Route::get('dat-hang',[
		'as'=>'order',
		'uses'=>'PageController@getCheckout'
	]);

	Route::get('delete/{id}',[
		'as'=>'delcart',
		'uses'=>'PageController@getDelItemCart'
	]);

	Route::get('update',[
		'as'=>'updateCart',
		'uses'=>'PageController@getUpdateCart'
	]);

	Route::post('dat-hang',[
		'as'=>'order',
		'uses'=>'PageController@postCheckout'
	]);
});

Route::get('complete',[
	'as'=>'complete',
	'uses'=>'PageController@getComplete'
]);

/*Route::get('dat-hang',[
	'as'=>'order',
	'uses'=>'PageController@getCheckout'
]);*/

/*Route::post('dat-hang',[
	'as'=>'order',
	'uses'=>'PageController@postCheckout'
]);*/

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('dang-ky',[
	'as'=>'register',
	'uses'=>'PageController@getRegister'
]);

Route::post('dang-ky',[
	'as'=>'register',
	'uses'=>'PageController@postRegister'
]);

Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);

Route::get('thong-tin-nguoi-dung',[
	'as'=>'user',
	'uses'=>'PageController@getUser'
]);

Route::post('thong-tin-nguoi-dung',[
	'as'=>'user',
	'uses'=>'PageController@postUser'
]);

Route::get('tin-tuc',[
	'as'=>'news',
	'uses'=>'PageController@getNews'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
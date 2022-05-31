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



Auth::routes();


Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.welcome');
Route::get('/test', 'TestController@test')->name('test');



Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    //installments
    Route::get('/installments', 'HomeController@installments')->name('installments');
    Route::post('/installments', 'HomeController@computing')->name('computing');


    //user
    Route::get('/user/invoice', 'UserController@invoice')->name('user.invoice');
    Route::get('/user/invoice/show/{id}', 'UserController@invoiceShow')->name('user.invoice.show');
    Route::get('/user/profile', 'UserController@profile')->name('user.profile');
    Route::post('/user/profile', 'UserController@store')->name('user.profile.store');
    Route::post('/cities', 'UserController@cities')->name('cities');



    Route::get('/page/{id}', 'PageController@index')->name('page');
    Route::get('/page/{id}/{slug}', 'PageController@slug')->name('page-slug');
    Route::get('/contact-us', 'ContactController@index')->name('contact');
    Route::get('/blog', 'ArticleController@index')->name('articles');
    Route::get('/items', 'ItemController@items')->name('items');
    Route::get('/customers', 'CustomerController@index')->name('customers');
    Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks');
    Route::get('/article/{id}/{slug}', 'ArticleController@article')->name('articleView');
    Route::get('/item/{id}/{slug}', 'ItemController@index')->name('itemView');


    //product
    Route::get('/shop', 'ProductController@shop')->name('shop');
    Route::get('/product/view/{id}', 'ProductController@view')->name('product.view');
    Route::get('/cart', 'ProductController@cart')->name('cart');
    Route::get('/add-to-cart/{id}', 'ProductController@addToCart')->name('addToCart');
    Route::patch('update-cart', 'ProductController@update')->name('update.cart');
    Route::delete('remove-from-cart', 'ProductController@remove')->name('remove.from.cart');


    //order-cart
    Route::get('/cart/information', 'CartController@information')->name('information');
    Route::post('/cart/information', 'CartController@store_information')->name('store.information');
    Route::get('/cart/payment', 'CartController@payment')->name('payment');
    Route::get('/cart/payment/callback', 'CartController@callback')->name('callback');







});

Route::group(['middleware' => 'admin','namespace' => 'Admin'], function () {
    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');

    //user
    Route::get('/admin/user', 'UserController@index')->name('admin.user');
    Route::get('/admin/user/data', 'UserController@data')->name('admin.user.data');


    //menu
    Route::get('/admin/category', 'CategoryController@index')->name('admin.category');
    Route::get('/admin/category/data', 'CategoryController@data')->name('admin.category.data');
    Route::get('/admin/category/create', 'CategoryController@create')->name('admin.category.create');
    Route::get('/admin/category/createId/{id}', 'CategoryController@createId')->name('admin.category.createId');
    Route::post('/admin/category/store', 'CategoryController@store')->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::post('/admin/category/update/{id}', 'CategoryController@update')->name('admin.category.update');
    Route::get('/admin/category/show/{id}', 'CategoryController@show')->name('admin.category.show');
    Route::delete('/admin/category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    //item
    Route::get('/admin/item', 'ItemController@index')->name('admin.item');
    Route::get('/admin/item.data', 'ItemController@data')->name('admin.item.data');
    Route::get('/admin/item/create', 'ItemController@create')->name('admin.item.create');
    Route::post('/admin/item/store', 'ItemController@store')->name('admin.item.store');
    Route::get('/admin/item/edit/{id}', 'ItemController@edit')->name('admin.item.edit');
    Route::post('/admin/item/update/{id}', 'ItemController@update')->name('admin.item.update');
    Route::get('/admin/item/show/{id}', 'ItemController@show')->name('admin.item.show');
    Route::delete('/admin/item/delete/{id}', 'ItemController@delete')->name('admin.item.delete');

    //article
    Route::get('/admin/article', 'ArticleController@index')->name('admin.article');
    Route::get('/admin/article/data', 'ArticleController@data')->name('admin.article.data');
    Route::get('/admin/article/create', 'ArticleController@create')->name('admin.article.create');
    Route::get('/admin/article/searchCat', 'ArticleController@searchCat')->name('admin.article.searchCat');
    Route::post('/admin/article/store', 'ArticleController@store')->name('admin.article.store');
    Route::get('/admin/article/edit/{id}', 'ArticleController@edit')->name('admin.article.edit');
    Route::post('/admin/article/update/{id}', 'ArticleController@update')->name('admin.article.update');
    Route::post('/admin/article/updateImage/{id}', 'ArticleController@updateImage')->name('admin.article.updateImage');
    Route::get('/admin/article/show/{id}', 'ArticleController@show')->name('admin.article.show');
    Route::delete('/admin/article/delete/{id}', 'ArticleController@delete')->name('admin.article.delete');

     //customer
     Route::get('/admin/customer', 'CustomerController@customer')->name('admin.customer');

     Route::get('/admin/customer/index', 'CustomerController@index')->name('admin.customer.index');
     Route::get('/admin/customer/create', 'CustomerController@create')->name('admin.customer.create');
     Route::post('/admin/customer/store', 'CustomerController@store')->name('admin.customer.store');
     Route::get('/admin/customer/edit/{id}', 'CustomerController@edit')->name('admin.customer.edit');
     Route::post('/admin/customer/update/{id}', 'CustomerController@update')->name('admin.customer.update');
     Route::delete('/admin/customer/delete/{id}', 'CustomerController@delete')->name('admin.customer.delete');

     //feedback
     Route::get('/admin/Feedback/index', 'FeedbackController@index')->name('admin.feedback.index');
     Route::get('/admin/Feedback/create', 'FeedbackController@create')->name('admin.feedback.create');
     Route::post('/admin/Feedback/store', 'FeedbackController@store')->name('admin.feedback.store');
     Route::get('/admin/Feedback/edit/{id}', 'FeedbackController@edit')->name('admin.feedback.edit');
     Route::post('/admin/Feedback/update/{id}', 'FeedbackController@update')->name('admin.feedback.update');
     Route::delete('/admin/Feedback/delete/{id}', 'FeedbackController@delete')->name('admin.feedback.delete');

     //slider
     Route::get('/admin/slider/index', 'SliderController@index')->name('admin.slider.index');
     Route::get('/admin/slider/create', 'SliderController@create')->name('admin.slider.create');
     Route::post('/admin/slider/store', 'SliderController@store')->name('admin.slider.store');
     Route::get('/admin/slider/edit/{id}', 'SliderController@edit')->name('admin.slider.edit');
     Route::post('/admin/slider/update/{id}', 'SliderController@update')->name('admin.slider.update');
     Route::delete('/admin/slider/delete/{id}', 'SliderController@delete')->name('admin.slider.delete');

    //setting
    Route::get('/admin/setting', 'SettingController@edit')->name('admin.setting');
    Route::put('/admin/setting/update', 'SettingController@update')->name('admin.setting.update');



    //product
    Route::get('/admin/product', 'ProductController@index')->name('admin.product.index');
    Route::get('/admin/product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/admin/product/store', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::post('/admin/product/update/{id}', 'ProductController@update')->name('admin.product.update');
    Route::delete('/admin/product/disable/{id}', 'ProductController@disable')->name('admin.product.disable');


    //page
    Route::get('/admin/page', 'PageController@index')->name('admin.page');
    Route::get('/admin/page/data', 'PageController@data')->name('admin.page.data');
    Route::get('/admin/page/edit/{id}', 'PageController@edit')->name('admin.page.edit');
    Route::post('/admin/page/update/{id}', 'PageController@update')->name('admin.page.update');
    Route::get('/admin/page/create', 'PageController@create')->name('admin.page.create');
    Route::post('/admin/page/insert', 'PageController@insert')->name('admin.page.insert');
    Route::delete('/admin/page/delete/{id}', 'PageController@delete')->name('admin.page.delete');


        //invoice
        Route::get('/admin/invoice', 'InvoiceController@index')->name('admin.invoice');
        Route::get('/admin/invoice/pendding', 'InvoiceController@pendding')->name('admin.invoice.pendding');
        Route::get('/admin/invoice/penddingData', 'InvoiceController@penddingData')->name('admin.invoice.penddingData');
        Route::get('/admin/invoice/paid', 'InvoiceController@paid')->name('admin.invoice.paid');
        Route::get('/admin/invoice/paidData', 'InvoiceController@paidData')->name('admin.invoice.paidData');
        Route::get('/admin/invoice/posted', 'InvoiceController@posted')->name('admin.invoice.posted');
        Route::get('/admin/invoice/postedData', 'InvoiceController@postedData')->name('admin.invoice.postedData');
        Route::get('/admin/invoice/show/{id}', 'InvoiceController@show')->name('admin.invoice.show');
        Route::post('/admin/invoice/update/{id}', 'InvoiceController@update')->name('admin.invoice.update');




});

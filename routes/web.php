<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

/******************ADMIN PANELS ROUTES****************/
Route::group(['prefix' => 'admin', 'as'=>'admin.','namespace' => 'Admin'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'admin.auth.index')->name('login');
    Route::post('login','AuthController@login');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard.index');
    /******************ADMIN ROUTES****************/
      Route::resource('admin', 'AdminController');    
    /******************CAR ROUTES****************/
      Route::post('car/get_car_models', 'CarController@getCarModels')->name('car.models');     
      Route::get('car/sold_out/{id}', 'CarController@soldOut')->name('car.sold_out');     
      Route::get('car/make_active/{id}', 'CarController@active')->name('car.active');     
      Route::resource('car', 'CarController');     
    /******************CAR MODEL ROUTES****************/
      Route::resource('car_model', 'CarModelController');
    /******************CAR IMAGES ROUTES****************/
      Route::resource('car_image', 'CarImageController');   
    /******************CATEGORY ROUTES****************/
      Route::resource('category', 'CategoryController');    
    /******************COUNTRY ROUTES****************/
      Route::resource('country', 'CountryController');     
    /******************TYPE ROUTES****************/
      Route::resource('type', 'TypeController');     
    /******************Setting ROUTES****************/
      Route::resource('setting', 'SettingController');  
    /******************Testimonial ROUTES****************/
      Route::resource('testimonial', 'ReviewController');    
    /******************Bank DETAILS ROUTES****************/
      Route::resource('bank_details', 'BankController');    
    /******************FAQ ROUTES****************/
      Route::resource('faq', 'FaqController');      
    /******************CONTACT US MESSAGES ROUTES****************/
    Route::view('messages/new', 'admin.message.unread')->name('messages.unread');
      Route::resource('messages', 'MessageController');    
    /******************BLOG ROUTES****************/
      Route::resource('blog_category', 'BlogCategoryController');    
      Route::resource('blog', 'BlogController');    
    /*******************Profile ROUTES*************/
    Route::view('profile', 'admin.profile.index')->name('profile.index');
    /******************User ROUTES****************/
    Route::get('user', 'UserController@index')->name('user.index');  
    Route::get('user/actives', 'UserController@active')->name('user.actives');  
    Route::get('user/pendings', 'UserController@pending')->name('user.pendings');  
    Route::get('user/detail/{id}','UserController@showDetail')->name('user.detail');
    Route::get('user/activation/{id}','UserController@activation')->name('user.activation');
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('user/block/{id}','UserController@block')->name('user.block');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::get('user/{user}/fake/login', 'UserController@fakeLogin')->name('login.fake');
   });
});
/******************USER PANELS ROUTES****************/
Route::group(['prefix' => 'user', 'as'=>'user.','namespace' => 'User'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login','AuthController@login');
    Route::group(['middleware' => 'auth:user'], function () { 
        /*******************Logout ROUTES*************/       
        Route::get('logout','AuthController@logout')->name('logout');
        /*******************Dashoard ROUTES*************/
        Route::view('dashboard', 'user.dashboard.index')->name('dashboard.index');
       /******************USER PROFILE  ROUTES****************/
       Route::resource('user', 'UserController');  
    });


    
});

/*******************FRONTEND ROUTES*************/
Route::view('/', 'front.home.index')->name('home.index');
Route::get('cars', 'FrontendController@showCar')->name('cars.index');
Route::get('cars/{name}', 'FrontendController@showCarDetails')->name('cars.show');
Route::get('category', 'FrontendController@showCategory')->name('category.index');
Route::get('category/{name}', 'FrontendController@showCategoryDetails')->name('category.show');
Route::get('type', 'FrontendController@showTypes')->name('type.index');
Route::get('type/{name}', 'FrontendController@showTypeDetails')->name('type.show');
Route::get('country', 'FrontendController@showCountries')->name('country.index');
Route::get('country/{name}', 'FrontendController@showCountriesDetails')->name('country.show');
Route::post('car/get_car_models', 'FrontendController@getCarModels')->name('car.models');     
Route::view('contact_us', 'front.contact.index')->name('contact.index');
Route::post('contact_us/save', 'FrontendController@SaveMessage')->name('contact.store');     
Route::view('about_us', 'front.about.index')->name('about.index');
Route::view('sales_terms', 'front.sales_terms.index')->name('sales_terms.index');
Route::view('bank_details', 'front.bank_details.index')->name('bank_details.index');
Route::view('faqs', 'front.faq.index')->name('faqs.index');
Route::get('blog_category', 'FrontendController@showBlogCategory')->name('blog_category.index');
Route::get('blog_category/{name}', 'FrontendController@showBlogCategoryDetails')->name('blog_category.show');
Route::get('blog', 'FrontendController@showBlogs')->name('blog.index');
Route::get('blog/{title}', 'FrontendController@showBlogsDetails')->name('blog.show');
Route::get('testimonials', 'FrontendController@showTestimonials')->name('testimonials.index');
/******************FUNCTIONALITY ROUTES****************/
Route::get('/cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'Migration done';
});
Route::get('/cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Cache Clear DOne';
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


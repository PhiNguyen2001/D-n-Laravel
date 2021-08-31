<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/danh-muc/{id}','HomeController@product')->name('cate-pro');
Route::get('/detail/{id}','HomeController@detail_product')->name('detail');
Route::get('/search','HomeController@search')->name('search-pro');
Route::get('/filter','HomeController@filter')->name('filter');


Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('frontend.loginPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('frontend.logout');
Route::get('/register', [LoginController::class, 'register'])->name('frontend.register');

Route::middleware(['login'])->group(function () {
    Route::get('/admin/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');
    /* --------------------------USER----------------------- */
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
    ], function () {
        Route::group([
            'prefix' => 'users',
            'as' => 'users.'
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('/{user}', 'UserController@show')->name('show');
            Route::get('edit/{user}', 'UserController@edit')->name('edit');
            Route::post('update/{user}', 'UserController@update')->name('update');
            Route::post('delete/{user}', 'UserController@delete')->name('delete');
        });
    });
    // * --------------------------DANH MỤC----------------------- */
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ], function () {
        Route::group([
            'prefix' => 'categories',
            'as'=> 'categories.'
        ], function(){
            Route::get('/', 'CateController@index')->name('index');
            Route::get('/create', 'CateController@create')->name('create');
            Route::post('/store', 'CateController@store')->name('store');
            Route::get('edit/{cate}', 'CateController@edit')->name('edit');
            Route::post('update/{cate}', 'CateController@update')->name('update');
            Route::post('delete/{cate}', 'CateController@delete')->name('delete');
        });
    });
    /* ----------------------------SẢN PHẨM------------------------------ */
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ], function () {
        Route::group([
            'prefix' => "products",
            'as' => "products."
        ], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/store', 'ProductController@store')->name('store');
            Route::get('/edit/{product}', 'ProductController@edit')->name('edit');
            Route::post('/update/{product}', 'ProductController@update')->name('update');
            Route::post('/delete/{product}', 'ProductController@delete')->name('delete');
        });
    });
    //invoice
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ], function () {
        Route::group([
            'prefix'=> "invoices",
            'as'=> "invoices."
        ], function () {
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::get('show/{id}', 'InvoiceController@show')->name('show');
            Route::post('delete/{id}', 'InvoiceController@delete')->name('delete');
        });
    });
    

});

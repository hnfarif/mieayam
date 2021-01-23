<?php

use App\Http\Controllers\Admin\DashboardController;
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

// Route::get('/', function () {

//     return view('welcome');
// });

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'CheckRole:admin']], function () {

    Route::get('dashboard', 'DashboardController@index');

    Route::get('testimoni', 'TestimoniController@index');
    Route::get('testimoni/{testimoni}', 'TestimoniController@show');
    Route::post('testimoni/store', 'TestimoniController@store');
    Route::delete('testimoni/{testimoni}', 'TestimoniController@destroy');
    Route::get('testimoni/{testimoni}/edit', 'TestimoniController@edit');
    Route::patch('testimoni/{testimoni}/edit', 'TestimoniController@update');

    Route::get('bahanbaku', 'BahanBakuController@index');
    Route::get('bahanbaku/{bahanbaku}', 'BahanBakuController@show');
    Route::post('bahanbaku/store', 'BahanBakuController@store');
    Route::delete('bahanbaku/{bahanbaku}', 'BahanBakuController@destroy');
    Route::get('bahanbaku/{bahanbaku}/edit', 'BahanBakuController@edit');
    Route::patch('bahanbaku/{bahanbaku}/edit', 'BahanBakuController@update');

    Route::get('user', 'UserController@index');
    Route::get('user/{user}', 'UserController@show');
    Route::post('user/store', 'UserController@store');
    Route::delete('user/{user}', 'UserController@destroy');
    Route::get('user/{user}/edit', 'UserController@edit');
    Route::patch('user/{user}/edit', 'UserController@update');


    Route::get('menu', 'MenuController@index');
    Route::get('menu/{menu}', 'MenuController@show');
    Route::post('menu/store', 'MenuController@store');
    Route::delete('menu/{menu}', 'MenuController@destroy');
    Route::get('menu/{menu}/edit', 'MenuController@edit');
    Route::patch('menu/{menu}/edit', 'MenuController@update');


    Route::get('penjualan', 'PenjualanController@index');
    Route::get('penjualan/{penjualan}', 'PenjualanController@show');
    Route::post('penjualan/store', 'PenjualanController@store');
    Route::delete('penjualan/{penjualan}', 'PenjualanController@destroy');
    Route::get('penjualan/{penjualan}/edit', 'PenjualanController@edit');
    Route::patch('penjualan/{penjualan}/edit', 'PenjualanController@update');


    Route::get('pembelian-material', 'BeliBahanBakuController@index');
    Route::get('pembelian-material/{pembelian}', 'BeliBahanBakuController@show');
    Route::post('pembelian-material/store', 'BeliBahanBakuController@store');
    Route::delete('pembelian-material/{pembelian}', 'BeliBahanBakuController@destroy');
    Route::get('pembelian-material/{pembelian}/edit', 'BeliBahanBakuController@edit');
    Route::patch('pembelian-material/{pembelian}/edit', 'BeliBahanBakuController@update');
});

Route::group(['namespace' => 'User', 'middleware' => ['auth', 'CheckRole:user,admin']], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/testimonial', 'TestimoniController@index');
    Route::get('/about', 'AboutController@index');
    Route::get('/menu', 'MenuController@index');
    Route::get('/cart', 'CartController@index');
    Route::post('/cart/store', 'CartController@store');
    Route::get('/cart/update/{id}', 'CartController@deleteCart');
    Route::post('/cart', 'MenuController@productSummary');
    Route::get('/checkout', 'CheckoutController@index');
    Route::get('/thank', 'ThankController@index');
    // Route::post('/cart', 'CartController@dataTotal');
    Route::post('/menu', 'MenuController@jumlahItem');
});





Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

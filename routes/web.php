<?php

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

Route::get('/', 'App\Http\Controllers\SellerController@display');



/*Route::get('/', function () {
    return view('home');
});
*/
Route::get('/test', function () {
    return view('auth/login');
});

Route::get('product/{id}', 'App\Http\Controllers\SellerController@iteminfo');

//Route::get('product/{name}', 'App\Http\Controllers\SellerController@tester');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('navigation-dropdown');
})->name('dashboard');*/

//Route::get('/product/{itemname}',['as' => 'product', 'uses' => 'SellerController@iteminfo']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 
'App\Http\Controllers\SellerController@dispitems'
)->name('dashboard');

Route::post('added', 'App\Http\Controllers\SellerController@populate');

Route::get('deleted/{id}', 'App\Http\Controllers\SellerController@deleteitem');



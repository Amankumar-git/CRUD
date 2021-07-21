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
Auth::routes();

// Get request routes

Route::get('/', 'HomeController@index')->name('home');

Route::get('/newWishList/{id}', function(){ return view('newWishList');});
Route::get('/edit/{id}', function(){ return view('editWishList');});
Route::get('/logout', 'HomeController@logout');

// Resource Controller Routes

Route::resource('wishlist', 'WishListController');

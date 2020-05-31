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

Route::get('/', 'WebController@index');
Route::get('order/{id}', 'WebController@order' )->name('web.order');
Route::post('order/checkout', 'WebController@checkout' )->name('web.checkout');

Auth::routes(['register' => false,'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/page/{on}', 'HomeController@page')->name('homepage');

//datatable
Route::get('/home/orders', 'HomeController@orders')->name('get.orders');
Route::get('/home/products', 'HomeController@products')->name('get.products');
Route::get('/home/users', 'HomeController@users')->name('get.users');

//api
Route::get('/home/delete', 'HomeController@delete')->name('home.delete');
Route::get('/home/edit', 'HomeController@edit')->name('home.edit');
Route::post('/home/editact', 'HomeController@edit_action')->name('home.editact');
Route::get('/home/add', 'HomeController@add')->name('home.add');
Route::post('/home/addact', 'HomeController@add_action')->name('home.addact');

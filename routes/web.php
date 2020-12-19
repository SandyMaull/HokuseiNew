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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomepageController@index');
Route::get('/logo', 'HomepageController@logo');
Route::get('/kegiatan', 'HomepageController@kegiatan');
// Auth::routes(['register' => false]);
Auth::routes(['register' => false]);

Route::get('/administrator','AdminController@index')->middleware('auth');
Route::get('/administrator/beranda','AdminController@editberanda')->name('HomeEdit')->middleware('auth');
Route::post('/administrator/edit/{page}','AdminController@posteditpage')->middleware('auth');
Route::post('/administrator/tambah/{page}','AdminController@postaddpage')->middleware('auth');
Route::post('/administrator/delete/{page}','AdminController@postdeletepage')->middleware('auth');


// Route::get('/home', 'HomeController@index')->name('home');
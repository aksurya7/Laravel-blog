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
//     return view('admin.index');
// });

Route::get('/', function () {
    return view('postview.main');
});
route::get('postview','PostViewController@index');
route::get('fullpost/{id}/{title}','PostViewController@fullpost')->name('fullpost');
route::resource('category','CategoryController');
route::resource('post','PostController');

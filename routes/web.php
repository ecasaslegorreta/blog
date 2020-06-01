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

//Auth::routes();
Auth::routes(['verify'=>true]); 




Route::resource('/posts', 'PostsController');

Route::get('/demo', function () {
    return view('theme.backoffice.pages.demo');
});

Route::get('/', function(){
    return view('theme.backoffice.pages.inicio');
});

Route::get('/contact', function(){
    return view('theme.backoffice.pages.contact');
});

Route::get('/about', function(){
    return view('theme.backoffice.pages.about');
});


Route::get('/home', 'HomeController@index')->name('home');

//Route::get('admin', 'AdminController@index')->middleware('auth');
//solo permite entrar los que esten logeados
// nosotros lo aremos desde el controlador App/Http/AdminController

Route::get('admin', 'AdminController@index');



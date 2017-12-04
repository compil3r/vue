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

Route::get('/', function () {
    $estados = json_encode(\App\Estado::all());
    return view('welcome', compact('estados'));
});

Route::get('/artigo/{string}', function($string) {
    return \App\Artigo::where('titulo', 'like', '%'.$string.'%')->get();
});

Route::get('/cidades/{id}', function($id) {
    $estados = \App\Estado::find($id);
    return $estados->cidade;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function() {
    Route::resource('artigos', 'ArtigosController');
});

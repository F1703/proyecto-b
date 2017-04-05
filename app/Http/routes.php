<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users','UsersController');
Route::resource('publicacion','PublicacionController');

Route::group(['middleware'=>'auth'],function(){

  Route::resource('categoria','CategoriaController');

  Route::resource('materia','MateriaController');

  Route::resource('perfil','PerfilController');
  // Route::get('perfil/{id}',[
  //   'uses'  =>  'UsersController@edit',
  //   'as'    =>  'users.perfil'
  // ]);
  // Route::resource('post','PostController');
  // Route::resource('post','PostController');
  Route::resource('comentario','ComentarioController');

});
  Route::resource('post','PostController');

//LOGIN
Route::get('login', [
  'uses'  =>  'Auth\AuthController@getLogin',
  'as'    =>  'auth.login'
]);
Route::post('login', [
  'uses'  =>  'Auth\AuthController@postLogin',
  'as'    =>  'auth.login'
]);
Route::get('logout', [
  'uses'  =>  'Auth\AuthController@getLogout',
  'as'    =>  'auth.logout'
]);

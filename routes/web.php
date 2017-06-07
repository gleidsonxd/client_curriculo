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
    return view('welcome');
});

Route::get('/main', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/loginadm', function () {
    return view('logingestor');
});
#usuarios
Route::post('/userlogin','UsuariosController@login');
Route::get('/logout','UsuariosController@logout');
#--
Route::post('/editar_usuario', 'UsuariosController@edit');#edit
Route::get('editar_pass/{id}','UsuariosController@editpass');#editpass
Route::get('usuarioForm','UsuariosController@form');#form
#--
Route::get('/profile/{id}','UsuariosController@profileUser');#read
Route::get('usuarios','UsuariosController@list');#list
Route::post('usuarios','UsuariosController@create');#create
Route::put('usuarios/{id}','UsuariosController@update');#update
Route::put('usuariospass/{id}','UsuariosController@updatepass');#update
Route::delete('usuarios/{id}','UsuariosController@delete');#delete
#gestores
Route::post('/gestorlogin','GestorsController@login');
Route::get('/gestorlogout','GestorsController@logout');
#--
Route::post('/editar_gestor', 'GestorsController@edit');#edit
Route::get('editar_gpass/{id}','GestorsController@editpass');#editpass
Route::get('gestorForm','GestorsController@form');#form
#--
Route::get('/account/{id}','GestorsController@accountGestor');#read
Route::get('gestors','GestorsController@list');#list
Route::post('gestors','GestorsController@create');#create
Route::put('gestors/{id}','GestorsController@update');#update
Route::put('gestorspass/{id}','GestorsController@updatepass');#update
Route::delete('gestors/{id}','GestorsController@delete');#delete
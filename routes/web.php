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
Route::get('/', function(){
    return redirect()->route('login');
});


Route::get('/login', ['as'=>'login','uses'=>'LoginController@index']);
Route::post('/login/entrar', ['as'=>'app.login.entrar','uses'=>'LoginController@entrar']);
Route::get('/login/sair', ['as'=>'sair.login','uses'=>'LoginController@sair']);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/agenda',['as'=>'agenda.home','uses'=>'AgendaController@index']);
    Route::get('/teste',['as'=>'teste.home','uses'=>'AgendaController@teste']);
    Route::get('/recupera/senha',['as'=>'recupera.senha','uses'=>'AgendaController@show']);

});

// ROUTES CRUD USUARIO
Route::resource('users', 'UserController');
Route::post('/users/atualizar', ['as'=>'users.atualizar','uses'=>'UserController@atualizar']);


// Routes AGENDA
Route::prefix('agenda')->group(function () {
    Route::post('entrar', ['as'=>'agenda.store','uses'=>'AgendaController@store']);
    Route::get('/{id}', ['as'=>'agenda.show','uses'=>'AgendaController@show']);
    Route::get('editar/{id?}/edit', ['as'=>'agenda.edit','uses'=>'AgendaController@edit']);
    Route::put('editar/{id}', ['as'=>'agenda.update','uses'=>'AgendaController@update']);
    Route::delete('/{id}', ['as'=>'agenda.remove','uses'=>'AgendaController@destroy']);

});

// 404 not found e error 505 
Route::get('/notFound', ['as'=>'notfound','uses'=>'AgendaController@found']);
Route::get('/notfound/error', ['as'=>'five','uses'=>'AgendaController@foundfive']);


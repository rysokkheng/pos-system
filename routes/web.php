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


Route::get('dashboard/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes();
Route::get('/',[ 'as' => 'login','uses' =>'LoginController@index']);
Route::get('login',[ 'as' => 'login','uses' =>'LoginController@index']);
Route::post('authenticate',[ 'as' => 'authenticate','uses' =>'LoginController@authenticate']);
Route::get('logout',[ 'as' => 'logout','uses' =>'LoginController@logout']);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['prefix' => '/','where' => ['locale' => '[a-zA-Z]{2}'],'middleware' => ['auth']], function() {
	Route::get('dashboard',[ 'as' => 'dashboard.index','uses' =>'HomeController@index']);

});
Route::group(['prefix' => 'admin','where' => ['locale' => '[a-zA-Z]{2}'],'middleware' => ['auth']], function() {
	Route::get('users.html',[ 'as' => 'users.index','uses' =>'UserController@index']);
	Route::get('users/create.html',[ 'as' => 'users.create','uses' =>'UserController@create']);
	Route::POST('users/store.html',['as'=>'users.store','uses'=>'UserController@store']);
	Route::GET('users/{id}/edit.html',['as'=>'users.edit','uses'=>'UserController@edit']);
	Route::PUT('users/update/{id}',['as'=>'users.update','uses'=>'UserController@update']);
	Route::GET('users/destroy/{id}',['as'=>'users.destroy','uses'=>'UserController@destroy']);

    Route::get('roles.html',[ 'as' => 'roles.index','uses' =>'RoleController@index']);
    Route::get('roles/create.html',[ 'as' => 'roles.create','uses' =>'RoleController@create']);
    Route::POST('roles/store.html',['as'=>'roles.store','uses'=>'RoleController@store']);
    Route::GET('roles/{id}/edit.html',['as'=>'roles.edit','uses'=>'RoleController@edit']);
    Route::PUT('roles/update/{id}',['as'=>'roles.update','uses'=>'RoleController@update']);

});

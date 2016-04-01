<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('indication_mgmt', function() {
    return view('indication/index');
});

Route::post('add_indication', 'Indication\IndicationController@store');

Route::post('edit_indication', 'Indication\IndicationController@store');

//Route::post('load_indication', 'Indication\IndicationController@load');

Route::post('load_indication/{id}/{id1}', ['uses' =>'Indication\IndicationController@load']);

Route::get('/', 'Indication\IndicationController@index');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

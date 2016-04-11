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
Route::post('load_indication/{id}/{id1}', ['uses' =>'Indication\IndicationController@load']);
Route::get('/indication_mgmt', 'Indication\IndicationController@index');

Route::get('/molecule_mgmt', 'Molecule\MoleculeController@index');
Route::post('add_molecule', 'Molecule\MoleculeController@store');
Route::post('edit_molecule', 'Molecule\MoleculeController@store');
Route::post('load_molecule/{id}/{id1}', ['uses' =>'Molecule\MoleculeController@load']);
Route::post('load_level2/{id}', ['uses' => 'Molecule\MoleculeController@loadLevel2Data']);

Route::get('/therapeutic_mgmt', 'Therapeutic\TherapeuticController@index');
Route::post('add_therapeutic', 'Therapeutic\TherapeuticController@store');
Route::post('edit_therapeutic', 'Therapeutic\TherapeuticController@store');
Route::post('load_therapeutic/{id}', ['uses' =>'Therapeutic\TherapeuticController@load']);

Route::get('/client_mgmt', 'Client\ClientController@index');
Route::post('add_client', 'Client\ClientController@store');
Route::post('edit_client', 'Client\ClientController@store');
Route::post('load_client/{id}', ['uses' =>'Client\ClientController@load']);

Route::post('add_group', 'Client\ClientController@storeGroup');

Route::post('load_indications/{id}', ['uses' =>'Client\ClientController@loadIndications']);
Route::post('load_molecules/{id}/{id1}', ['uses' => 'Client\ClientController@loadMolecules']);

Route::post('add_indication_entry', 'Client\ClientController@storeIndicationEntry');
Route::post('load_indication_entry_list/{id}', ['uses' => 'Client\ClientController@load_indication_entry_list']);
Route::post('add_molecule_entry', 'Client\ClientController@storeMoleculeEntry');

Route::post('edit_bg_entry/{id}/{id1}', ['uses' => 'Client\ClientController@editBGEntry']);
Route::post('edit_bg_submit', 'Client\ClientController@storeEditGroup');
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

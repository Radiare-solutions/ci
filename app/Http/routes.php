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

/* start of soumya codes */
Route::get('/', function () {
    return view('layouts/index');
});
Route::get('/home.html', function () {
    return view('layouts/index');
});
/*Route::get('/roles.html', function () {
    return view('layouts/roles');
});*/
Route::get('/roles.html', 'Role_Management_Controller@index');
Route::get('/users.html', 'User_Management_Controller@index');

Route::get('/molecules.html', function () {
    return view('layouts/molecules');
});

Route::post('add_role', 'Role_Management_Controller@store');
Route::post('edit_role_form/{id}', 'Role_Management_Controller@editroleform');
Route::post('edit_role_submit', 'Role_Management_Controller@editrolesubmit');
Route::post('add_user', 'User_Management_Controller@store');
Route::post('edit_user_form/{id}', 'User_Management_Controller@edituserform');
Route::post('edit_user_submit/{uid}', ['uses' => 'User_Management_Controller@editusersubmit']);

//Feed Management Section
Route::get('/feeds.html', 'Feed_Management_Controller@index');
Route::get('/list_feeds', 'Feed_Management_Controller@list_feeds');
Route::post('add_feed', 'Feed_Management_Controller@add_feeds');
Route::post('load_feed/{id}', 'Feed_Management_Controller@loadFeed');
Route::post('delete_feed_details/{dfid}', 'Feed_Management_Controller@deletefeeddetails');

Route::post('load_bg/{id}', 'Feed_Management_Controller@loadBG');
Route::post('load_therapeutic_detail/{id}', 'Feed_Management_Controller@loadTherapeutic');
Route::post('load_indication/{id}', 'Feed_Management_Controller@loadIndication');
Route::post('load_level1_detail/{id}', 'Feed_Management_Controller@loadLevel1');
Route::post('load_level2_detail/{id}', 'Feed_Management_Controller@loadLevel2');
Route::post('load_molecule_detail/{id}', 'Feed_Management_Controller@loadMoleculues');
/* end of soumya codes */

/* start of mohana priya codes */
Route::get('/clinical_trial', 'ClinicalController@Extract');
Route::get('/conference_calendar', 'ConfCalendarController@Extract');
/* end of mohana priya codes */

Route::get('indication_mgmt', function() {
    return view('indication/index');
});

Route::post('add_indication', 'Indication\IndicationController@store');
Route::post('edit_indication', 'Indication\IndicationController@store');
Route::post('load_indication/{id}/{id1}', ['uses' =>'Indication\IndicationController@load']);
Route::get('/indication_mgmt', 'Indication\IndicationController@index');
Route::post('remove_indication/{id}/{id1}', ['uses' =>'Indication\IndicationController@removeIndication']);

Route::get('/molecule_mgmt', 'Molecule\MoleculeController@index');
Route::post('add_molecule', 'Molecule\MoleculeController@store');
Route::post('edit_molecule', 'Molecule\MoleculeController@store');
Route::post('load_molecule/{id}/{id1}', ['uses' =>'Molecule\MoleculeController@load']);
Route::post('load_feed_molecules/{id}/{id1}', ['uses' => 'Molecule\MoleculeController@loadMolecules']);
Route::post('load_level2/{id}', ['uses' => 'Molecule\MoleculeController@loadLevel2Data']);
Route::post('remove_molecule/{id}', ['uses' =>'Molecule\MoleculeController@removeMolecule']);

Route::get('/therapeutic_mgmt', 'Therapeutic\TherapeuticController@index');
Route::post('add_therapeutic', 'Therapeutic\TherapeuticController@store');
Route::post('edit_therapeutic', 'Therapeutic\TherapeuticController@store');
Route::post('load_therapeutic/{id}', ['uses' =>'Therapeutic\TherapeuticController@load']);
Route::post('remove_therapeutic/{id}', ['uses' =>'Therapeutic\TherapeuticController@removeTherapeutic']);

Route::get('/client_mgmt', 'Client\ClientController@index');
Route::post('add_client', 'Client\ClientController@store');
Route::post('edit_client', 'Client\ClientController@store');
Route::post('load_client/{id}', ['uses' =>'Client\ClientController@load']);
Route::post('remove_client/{id}', ['uses' =>'Client\ClientController@removeClient']);

Route::post('add_group', 'Client\ClientController@storeGroup');
Route::post('remove_group/{id}/{id1}', ['uses' =>'Client\ClientController@removeGroup']);

Route::post('load_indications/{id}', ['uses' =>'Client\ClientController@loadIndications']);
Route::post('load_molecules/{id}/{id1}', ['uses' => 'Client\ClientController@loadMolecules']);

Route::post('add_indication_entry', 'Client\ClientController@storeIndicationEntry');
Route::post('load_indication_entry_list/{id}', ['uses' => 'Client\ClientController@load_indication_entry_list']);
Route::post('remove_indication_entry/{id}/{id1}', ['uses' => 'Client\ClientController@removeIndicationEntry']);

Route::post('add_molecule_entry', 'Client\ClientController@storeMoleculeEntry');
Route::post('load_molecule_entry_list/{id}', ['uses' => 'Client\ClientController@load_molecule_entry_list']);
Route::post('remove_molecule_entry/{id}/{id1}', ['uses' => 'Client\ClientController@removeMoleculeEntry']);

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

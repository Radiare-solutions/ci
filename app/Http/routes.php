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
Route::post('remove_role/{id}', 'Role_Management_Controller@removeRole');

Route::post('add_user', 'User_Management_Controller@store');
Route::post('edit_user_form/{id}', 'User_Management_Controller@edituserform');
Route::post('edit_user_submit', ['uses' => 'User_Management_Controller@editusersubmit']);
Route::post('remove_user/{id}', 'User_Management_Controller@removeUser');

// Data Types Section
Route::get('datatype_mgmt', 'DataTypes\DataTypesController@index');
Route::post('add_datatype', 'DataTypes\DataTypesController@store');
Route::post('load_data_type/{id}', 'DataTypes\DataTypesController@load');
Route::post('edit_datatype_submit', 'DataTypes\DataTypesController@store');
Route::post('delete_datatype/{id}', 'DataTypes\DataTypesController@removeDataType');

//Feed Management Section
Route::get('/feeds.html', 'Feed_Management_Controller@index');
Route::get('/list_feeds', 'Feed_Management_Controller@list_feeds');
Route::post('add_feed', 'Feed_Management_Controller@add_feeds');
Route::post('edit_feed', 'Feed_Management_Controller@edit_feeds');
Route::post('load_feed/{id}', 'Feed_Management_Controller@loadFeed');
Route::post('delete_feed_details/{dfid}', 'Feed_Management_Controller@deletefeeddetails');

Route::post('load_bg/{id}/{id1}', 'Feed_Management_Controller@loadBG');
Route::post('load_therapeutic_detail/{id}/{id1}', 'Feed_Management_Controller@loadTherapeutic');
Route::post('load_indication_detail/{id}/{id1}', 'Feed_Management_Controller@loadIndicationDetail');
Route::post('load_level1_detail/{id}/{id1}', 'Feed_Management_Controller@loadLevel1');
Route::post('load_level2_detail/{id}/{id1}', 'Feed_Management_Controller@loadFeedLevels2');
Route::post('load_molecule_detail/{id}/{id1}/{id2}', 'Feed_Management_Controller@loadFeedMoleculesByLevelID');
/* end of soumya codes */

/* start of mohana priya codes */
Route::post('clinical_trial', 'ClinicalController@Extract');
Route::get('detail_study_summary', 'ClinicalDetailStudyController@index');
Route::get('/conference_calendar', 'ConfCalendarController@Extract');
/* end of mohana priya codes */

Route::get('import_indication_data', 'ImportIndicationDataController@load');
Route::get('import_molecule_data', 'ImportMoleculeDataController@load');

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
Route::post('load_level2/{id}/{id1}', ['uses' => 'Molecule\MoleculeController@loadLevel2Data']);
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

/* start of verify codes */
Route::get('sponsor_mgmt', 'Verify\SponsorController@index');
Route::post('load_sponsor/{id}', 'Verify\SponsorController@loadSponsor');
Route::post('edit_sponsor', 'Verify\SponsorController@store');
Route::post('delete_sponsor/{id}', 'Verify\SponsorController@removeSponsor');

Route::get('drug_mgmt', 'Verify\DrugController@index');
Route::post('load_drug/{id}', 'Verify\DrugController@loadDrug');
Route::post('edit_drug', 'Verify\DrugController@store');
Route::post('delete_drug/{id}', 'Verify\DrugController@removeDrug');

Route::get('condition_mgmt', 'Verify\ConditionController@index');
Route::post('load_condition/{id}', 'Verify\ConditionController@loadCondition');
Route::post('edit_condition', 'Verify\ConditionController@store');
Route::post('delete_condition/{id}', 'Verify\ConditionController@removeCondition');
/* end of verify codes */

/* start of client setup codes */
Route::get('client_setup', 'Client\ClientSetupController@index');
Route::post('add_client_setup', 'Client\ClientSetupController@store');
/* end of client setup codes */


/* start of clinical trial codes */
Route::get('study_summary', 'ClinicalTrials\StudySummaryController@loadStudySummary');

Route::get('dashboard', 'ClinicalTrials\DashboardController@index');
Route::get('list_studies', 'ClinicalTrials\ListStudiesController@loadStudyList');
Route::post('filter_studies/{page}/{sort_field}/{order}', 'ClinicalTrials\ListStudiesController@filterStudies');
/* end of clinical trial codes */

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

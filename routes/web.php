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

Route::get('/', 'Home\HomeController@index')->name('home');
// FrontEnd
Route::get('/get-voters', 'Frontend\GetDataController@getVoters');
Route::get('/get-voters/{id}/confirm', 'Frontend\GetDataController@confirmVoter')->name('get.confirmation');
Route::post('/get-voters/{id}', 'Frontend\GetDataController@showVoter')->name('voter.show');
Route::post('/get-voters-no/{id}', 'Frontend\GetDataController@showVoterNo');

// Login
Route::get('login', 'Frontend\AdminLoginController@login')->name('login');
Route::post('login', 'Frontend\AdminLoginController@attempLogin');
Route::get('logout', 'Frontend\AdminLoginController@logout')->name('logout');

// search requests
Route::get('filterData', 'Home\HomeController@getfilterData')->name('filterData');
Route::post('getVoters', 'Home\HomeController@getVoters');

// BACKEND
Route::group(['middleware'=>'auth'], function(){


Route::resource('state', 'state\StateController');
Route::get('state/{state}/delete', 'state\StateController@delete')->name('state.delete');

Route::resource('zone', 'zone\ZoneController');
Route::get('zone/{zone}/delete', 'zone\ZoneController@delete')->name('zone.delete');

Route::resource('district', 'district\DistrictController');
Route::get('district/{district}/delete', 'district\DistrictController@delete')->name('district.delete');

Route::resource('vdc-minicipality', 'minicipality\MunicipalityVdcController');
Route::get('minicipality/{minicipality}/delete', 'minicipality\MunicipalityVdcController@delete')->name('minicipality.delete');

Route::resource('ward', 'ward\WardController');
Route::get('ward/{ward}/delete', 'ward\WardController@delete')->name('ward.delete');

Route::resource('constituency-area', 'constituency\ConstituencyAreaController');
Route::get('constituency-area/{area}/delete', 'constituency\ConstituencyAreaController@delete')->name('area.delete');

// Assembly
Route::resource('representative-assembly', 'Assembly\RepresentativeController');
Route::get('representative-assembly/{id}/delete', 'Assembly\RepresentativeController@delete')->name('representative.delete');

Route::resource('state-assembly', 'Assembly\StateController');
Route::get('state-assembly/{id}/delete', 'Assembly\StateController@delete')->name('state-assembly.delete');

Route::resource('users', 'User\UserController');
Route::get('users/{user}/delete', 'User\UserController@delete')->name('users.delete');
});


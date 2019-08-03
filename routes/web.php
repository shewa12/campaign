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
	$id= Auth::id();
	if(empty($id))
	{
   		return view ('auth.login');
   }
   else{
   	return redirect()->route('home');
   }
})->name('public');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'AdminCtrl@index');
Route::get('/test','HomeController@test');

//Technician management start
Route::group([],function(){
	Route::get('/users',"Users@getUsers")->name('users');
	Route::post('/save-user', "Users@saveUser")->name('saveUser');
	Route::post('/update-user', "Users@updateUser")->name('updateUser');
	Route::get('/delete-user/{id}', "Users@deleteUser")->name('deleteUser')->where('id','[0-9]+');
});
//Technicain management end

//App user management start
Route::group([],function(){
	Route::get('/app-users',"AppUsersCtrl@getUsers")->name('appUsers');
	Route::post('/save-app-user', "AppUsersCtrl@saveUser")->name('saveAppUser');
	Route::post('/update-app-user', "AppUsersCtrl@updateUser")->name('updateAppUser');
	Route::get('/delete-app-user/{id}', "AppUsersCtrl@deleteUser")->name('deleteAppUser')->where('id','[0-9]+');
});
//App user management end

//Service management start
Route::group([],function(){
	Route::get('/services',"ServicesCtrl@getServices")->name('getServices');
	
	Route::post('/save-service', "ServicesCtrl@saveService")->name('saveService');
	Route::post('/update-service', "ServicesCtrl@updateService")->name('updateService');
	Route::get('/delete-service/{id}', "ServicesCtrl@deleteService")->name('deleteService')->where('id','[0-9]+');

});
//Service management end

//Features management start
Route::group([],function(){
	Route::get('/features',"FeaturesCtrl@getFeatures")->name('getFeatures');
	
	Route::post('/save-feature', "FeaturesCtrl@saveFeature")->name('saveFeature');

	Route::post('/update-feature', "FeaturesCtrl@updateFeature")->name('updateFeature');

	Route::get('/delete-feature/{id}', "FeaturesCtrl@deleteFeature")->name('deleteFeature')->where('id','[0-9]+');

});
//Features management end

//Locations management start
Route::group([],function(){
	Route::get('/locations',"LocationCtrl@getLocations")->name('getLocations');
	
	Route::post('/save-location', "LocationCtrl@saveLocation")->name('saveLocation');

	Route::post('/update-location', "LocationCtrl@updateLocation")->name('updateLocation');

	Route::get('/delete-location/{id}', "LocationCtrl@deleteLocation")->name('deleteLocation')->where('id','[0-9]+');

});
//Locations management end

//worklog operation
Route::get('/work-log', 'HomeController@workLog')->name('workLog');
Route::post('/save-worklog', 'HomeController@saveWorklog');
Route::post('/update','HomeController@updateWorklog')->name('updateForm');
Route::get('/delete/{id}',"HomeController@deleteWorklog")->name('delete');
Route::get('/pdf',"HomeController@downloadPDF")->name('pdf');
//worklog operation
//settings start
Route::Group([],function(){
	Route::get('setting',"HomeController@setting")->name('setting');
	Route::get('change-password',"HomeController@changePassword")->name('changePassword');
	Route::post('update-account',"HomeController@updateAccount")->name('updateAccount');
	Route::post('update-password',"HomeController@updatePassword")->name('updatePassword');
});
//settings end

/*routes for employee*/
Route::group(['middleware'=>['auth','employee']], function(){
	Route::get('/employee', "Employee@index")->name('employee');
});
/*routes for employee end*/

/*routes for campaign account users*/
Route::group(['middleware'=>['auth','campaign']], function(){
	Route::get('/campaign', "Campaign@index")->name('campaign');
});
/*routes for campaign account users end*/

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



//Route::get('/admin', 'AdminCtrl@index');
Route::get('/test','HomeController@test');
Route::get('/home', 'HomeController@index')->name('home');
/*admin routes*/
Route::group(['middleware'=>['auth','admin']], function(){
	//campaign start
	Route::get('/campaign', "CampaignAdmin@index")->name('campaignAdmin');

	Route::get('/campaign-detail/{camp_id}', "CampaignAdmin@getKeywordForCamp")->name('campaignDetailAdmin')->where('camp_id','[0-9]+');		
	//campaign end
	//employee management start
		Route::get('/manage-employee',"Users@getUsers")->name('users');
		Route::get('/employee-detail/{id}',"Users@userDetail")->name('userDetail')->where('id','[0-9]+');
		Route::post('/save-employee', "Users@saveUser")->name('saveUser');
		Route::post('/update-employee', "Users@updateUser")->name('updateUser');
		Route::get('/delete-employee/{id}', "Users@deleteUser")->name('deleteUser')->where('id','[0-9]+');
		Route::post('/asign-employee',"Users@asignUser")->name('asignEmployee');
	//employee management end

	//App user management start
		Route::get('/app-users',"AppUsersCtrl@getUsers")->name('appUsers');
		Route::post('/save-app-user', "AppUsersCtrl@saveUser")->name('saveAppUser');
		Route::post('/update-app-user', "AppUsersCtrl@updateUser")->name('updateAppUser');
		Route::get('/delete-app-user/{id}', "AppUsersCtrl@deleteUser")->name('deleteAppUser')->where('id','[0-9]+');
	//App user management end		

});


/*admin routes end*/

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
	Route::get('/asigned-campaign', "Employee@index")->name('employee');
	Route::get('/asigned-campaign/detail/{camp_id}', "Employee@employeeCampaign")->name('employeeCampaign')->where('camp_id','[0-9]+');
	Route::get('/manage-sales/{keyword_id}', "Employee@manageSales")->name('manageSales')->where('keyword_id','[0-9]+');	
});
/*routes for employee end*/

/*routes for campaign account users*/
Route::group(['middleware'=>['auth','campaign']], function(){
	Route::get('/campaign-dashboard', "Campaign@index")->name('campaign');

	Route::get('/campaign/detail/{camp_id}', "Campaign@getKeywordForCamp")->name('campaignDetail')->where('camp_id','[0-9]+');

	Route::get('/campaign/create', "Campaign@createCampaign")->name('createCampaign');

	Route::post('/campaign/create', "Campaign@saveCampaign")->name('saveCampaign');


	Route::get('/campaign/faq', "Campaign@faq")->name('faq');

	Route::get('/campaign/affiliate-programe', "Campaign@affiliate")->name('affiliate');
});
/*routes for campaign account users end*/

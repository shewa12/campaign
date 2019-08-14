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
	//faq, aff, bank start
	Route::get('home/bank-detail',"HomeController@bankDetail")->name('bankDetail');
	Route::get('home/affiliate',"HomeController@affiliateManage")->name('affiliateManage');
	Route::get('home/faq',"HomeController@faqManage")->name('faqManage');

	Route::post('home/update-bank',"HomeController@updateBank")->name('updateBank');
	Route::post('home/update-affiliate',"HomeController@updateAffiliate")->name('updateAffiliate');
	Route::post('home/update-faq',"HomeController@updateFaq")->name('updateFaq');

	//faq, aff, bank end

	//campaign start
	Route::get('/home/update-payment-status/{id}','HomeController@updatePaymentStatus')->name('paymentStatus')->where('id','[0-9]+');

	Route::get('home/campaign-detail/{camp_id}', "CampaignAdmin@getKeywordForCamp")->name('campaignDetailAdmin')->where('camp_id','[0-9]+');
	
	Route::get('home/sales/{keyword_id}',"Campaign@campaignSales");		
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

	Route::get('manage-sales/{keyword_id}', "Employee@manageSales")->name('manageSales')->where('keyword_id','[0-9]+');	

	Route::post('add/sale', "Employee@addSale")->name('addSale');	
});
/*routes for employee end*/

/*routes for campaign account users*/
Route::group(['middleware'=>['auth','campaign']], function(){
	Route::get('/campaign-dashboard', "Campaign@index")->name('campaign');

	Route::get('/campaign/detail/{camp_id}', "Campaign@getKeywordForCamp")->name('campaignDetail')->where('camp_id','[0-9]+');
	Route::get('/campaign/sales/{keyword_id}',"Campaign@campaignSales");
	Route::get('/campaign/create', "Campaign@createCampaign")->name('createCampaign');

	Route::post('/campaign/create', "Campaign@saveCampaign")->name('saveCampaign');


	Route::get('/campaign/faq', "Campaign@faq")->name('faq');

	Route::get('/campaign/affiliate-programe', "Campaign@affiliate")->name('affiliate');
	Route::get('/campaign/bank-detail', "Campaign@bank")->name('campaignBank');
});
/*routes for campaign account users end*/

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
      return redirect()->route('login');
});

Route::get('/fcft','User@fcft');
//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/company','CompanyController');
Route::post('/update_status','CompanyController@update_status');
Route::post('/material_store','CompanyController@material_store');

Route::resource('/emplyoee','EmplyoeeController');
Route::post('/update_status_emplyoee','EmplyoeeController@update_status');

Route::get('get_emplyoee/{id}', 'EmplyoeeController@get_emplyoee')->name('get_emplyoee');

Route::resource('/emplyoee_profile','EmplyoeeprofileController');
Route::post('/get_emp_details','EmplyoeeprofileController@get_emp_details');

Route::resource('/petrol_pump','PetrolPumpController');
Route::post('/update_status_petrol','PetrolPumpController@update_status_petrol');

Route::resource('/vechile_owner','VechileOwnerController');
Route::post('/update_status','VechileOwnerController@update_status');
Route::get('/OwnerDetail','VechileOwnerController@OwnerDetail');

Route::resource('/truck','TruckController');
Route::post('/update_status','TruckController@update_status');
Route::get('/TruckDetail','TruckController@TruckDetail');

Route::resource('/driver','DriverController');
Route::post('/update_status','DriverController@update_status');
Route::get('/DriverDetail','DriverController@DriverDetail');

Route::resource('/staff','StaffController');

Route::resource('/rate_chart','RateChartController');
Route::post('/update_status','RateChartController@update_status');
Route::get('/RateDetail','RateChartController@RateDetail');

Route::resource('/truck_placement','TruckPlaceController');
Route::post('/update_status','TruckPlaceController@update_status');

Route::resource('/loading_slip','LoadingSlipController');
Route::post('/update_status','LoadingSlipController@update_status');

Route::resource('/invoice','InvoiceController');

Route::resource('/debit_voucher','DebitVoucherController');
Route::get('/allvoucher/{vechile_no}','DebitVoucherController@allvoucher');

Route::resource('/truck_hisab','TruckHisabController');

Route::resource('/fuel','FuelController');

Route::resource('/bill','BillingController');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/roles', 'RoleController');
Route::resource('/users', 'UserController');


Route::get('/daterange', 'DateRangeController@index');
Route::post('/daterange/fetch_data', 'DateRangeController@fetch_data')->name('daterange.fetch_data');



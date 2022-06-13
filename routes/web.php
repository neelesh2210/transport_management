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

//Company
Route::resource('/company','CompanyController')->except(['destroy']);
Route::get('company-delete/{id}','CompanyController@destroy')->name('company.destroy');
Route::get('/update_status/{id}/{status}','CompanyController@update_status')->name('update.status');

//Branch
Route::resource('branch','BranchController')->except(['destroy']);
Route::get('branch-delete/{id}','BranchController@destroy')->name('branch.destroy');
Route::get('update-branch-status/{id}/{status}','BranchController@update_status')->name('update.branch.status');
Route::post('/material_store','CompanyController@material_store')->name('material.store');
Route::post('get-branch','CompanyController@getBranch')->name('get.branch');

Route::resource('/emplyoee','EmplyoeeController');
Route::get('update-status-emplyoee/{id}/{status}','EmplyoeeController@update_status')->name('update.status.emplyoee');

Route::get('get_emplyoee/{id}', 'EmplyoeeController@get_emplyoee')->name('get_emplyoee');

Route::resource('/emplyoee_profile','EmplyoeeprofileController');
Route::post('/get_emp_details','EmplyoeeprofileController@get_emp_details');

//Petrol Pump
Route::resource('/petrol_pump','PetrolPumpController')->except(['destroy']);
Route::get('petrol-pump-delete/{id}','PetrolPumpController@destroy')->name('petrol.pump.destroy');
Route::get('/update_status_petrol/{id}/{status}','PetrolPumpController@update_status_petrol')->name('update.status.petrol');

//Vechile Owner
Route::resource('/vechile_owner','VechileOwnerController')->except(['destroy']);
Route::get('vechile-owner-delete/{id}','VechileOwnerController@destroy')->name('vechile.owner.destroy');
Route::get('update-status-vechile-owner/{id}/{status}','VechileOwnerController@updateStatusVechileOwner')->name('update.status.vechile.owner');
Route::get('/OwnerDetail','VechileOwnerController@OwnerDetail');

Route::resource('/truck','TruckController');
Route::post('/update_status','TruckController@update_status');
Route::get('/TruckDetail','TruckController@TruckDetail');

//Driver
Route::resource('/driver','DriverController')->except(['destroy']);
Route::get('update-status-driver/{id}/{status}','DriverController@update_status')->name('update.status.driver');
Route::get('driver-delete/{id}','DriverController@destroy')->name('driver.destroy');
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



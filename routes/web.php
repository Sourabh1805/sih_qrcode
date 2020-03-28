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
    return view('welcome');
});

Route::get('login', function () {
    return view('InitiatorLogin');
});

Route::get('dashboard', function () {
    return view('Admin_Dashboard');
});

Route::get('myfiles','Doc_FileController@myfiles');



Route::get('home', function () {
    return view('Initiator_DashBoard');
});
Route::get('employeedashboard', function () {
    return view('Employee_DashBoard');
});


Route::get('faq', function () {
    return view('Initiator_FAQ');
});

Route::get('admindashboard', function () {
    return view('Sadmin_Dashboard');
});





Route::resource('officepost','Office_PostController');


Route::resource('office','OfficeController');
Route::resource('admin','AdminController');
Route::resource('def_message','Def_MessageController');
Route::resource('doc_file','Doc_FileController');
Route::resource('employee','EmployeeController');
Route::resource('file_action','File_ActionController');
Route::resource('initiator','InitiatorController');
Route::resource('office_desk','Office_DeskController');
Route::resource('task','TaskController');
Route::resource('auth','AuthenticationController');
Route::resource('office_entity','Office_EntityController');

Route::resource('office_department','Office_DepartmentController');
Route::resource('temp','TempController');
Route::resource('bunch','File_BunchController');
Route::resource('rack','Office_RackController');
Route::resource('searchfile','SearchFileController');
Route::resource('delay','SendDelayNotificationController');
Route::resource('leave','AddLeaveController');
Route::resource('pendingfile','PendingFilesController');

Route::resource('qrcode','QrcodeController');
Route::resource('store_file','StoreFileController');

Route::post('check','AuthenticationController@LoginAdmin');
Route::get('getfiles','WebServiceController@getFiles');
Route::post('updatestatus','WebServiceController@updateStatus');





Route::get('/myqrcode/{id}','QrcodeController@myqrcode');

Route::get('/myfileaction/{id}','File_ActionController@myfileaction');

Route::get('/adminmyfileaction/{id}','File_ActionController@adminmyfileaction');

Route::get('/logout','AuthenticationController@LogOut');

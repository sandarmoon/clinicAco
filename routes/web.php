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

Route::get('/timeline', function () {
    return view('timeline');
});

// login page

Route::get('/dashboard','ExpenseController@superadmindashboard')->name('dashboard');


Route::group(['middleware' => ['auth','role:Reception|Super_Admin']], function () {
	// dashboard
	
Route::get('/rdashboard', 'ReceptionController@dashboard')->name('rdashboard');
    // booking
    Route::get('appointment/create','AppointmentController@create')->name('appointment.create');




	Route::post('/getToken','AppointmentController@getToken')->name('getToken');

	Route::post('appointment/store','AppointmentController@store')->name('appointment.store');

	Route::get('/getAppointment','AppointmentController@getAppointment')->name('getAppointment');

	Route::post('/searchPRN','AppointmentController@searchPRN')->name('searchPRN');
	Route::post('/confirmAppoints','AppointmentController@confirmAppoints')->name('confirmAppoints');

	Route::get('/noappointment/create','AppointmentController@noappointment')->name('noappointment.create');

	Route::post('/noappointmentStore','AppointmentController@noappointmentStore')->name('noappointmentStore');

	Route::delete('/appointmentCancel/{id}','AppointmentController@appointmentCancel')->name('appointmentCancel');
});


Route::group(['middleware' => ['auth','role:Admin']], function () {

Route::get('/', 'ExpenseController@index');
});
// Route::get('/', 'ExpenseController@index')->middleware('auth');
Route::get('/ddashboard', 'DoctorController@dashboard')->name('ddashboard');
// Route::get('/rdashboard', 'ReceptionController@dashboard')->name('rdashboard');
Route::get('/t', function(){
	return view('timeline');
});

Route::group(['middleware' => ['auth']], function () {
	// medicines
Route::resource('/medicine','MedicineController');

// Medicine Types
Route::resource('/medicineType','MedicineTypeController');

// Treatments
Route::resource('/treatment','TreatmentController');
});



Route::group(['middleware' => ['auth','role:Doctor|Super_Admin']], function () {
	Route::get('/appointpatient','AppointmentController@appointpatient')->name('appointpatient');
	//appointment of doctor
	// treatmentstart
	Route::get('/appointpatienthistory/{treatment_id}/{patient_id}','AppointmentController@patient')->name('appointpatienthistory');
});



Route::get('/getTreatments','TreatmentController@getTreatments')->name('getTreatments');

Route::resource('/referredDoctor','ReferredDoctorController');//doctor route





//treatment end

// Json responses
Route::get('/getMedicineType','MedicineTypeController@getMedicineType')->name('medicineType.getType');//doctor,owner,reception

Route::get('/getMedicine','MedicineController@getMedicine')->name('getMedicine');
//doctor,owner,reception

Route::get('/getuser','ReceptionController@getuser')->name('getuser');//ajax

//Owner
Route::resource('owners','OwnerController');//owner




Route::get('/getOwners','OwnerController@getOwners')->name('getOwners');


//Doctor
Route::resource('doctor','DoctorController');

Route::get('/getDoctor','DoctorController@getDoctor')->name('getDoctor');


//Patient
Route::resource('patient','PatientController');
Route::post('incharge','PatientController@incharge')->name('incharge');

Route::resource('reception','ReceptionController');//reception

Route::get('print','PrintOutController@index')->name('print');//reception


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profit-expense
Route::resource('/expense','ExpenseController');

Route::get('/getExpense','ExpenseController@getExpense')->name('getExpense');
Route::post('/searchReport','ExpenseController@searchReport')->name('searchReport');

// AppointmentPatient

Route::get('/appointpatient','AppointmentController@appointpatient')->name('appointpatient');
//appointment of doctor
// treatmentstart
Route::get('/appointpatienthistory/{treatment_id}/{patient_id}','AppointmentController@patient')->name('appointpatienthistory');
Route::post('/appmedicine','AppointmentController@getmedicine')->name('appmedicine');
// tretementend





// booking start 
// Route::get('appointment/create','AppointmentController@create')->name('appointment.create');




// Route::post('/getToken','AppointmentController@getToken')->name('getToken');

// Route::post('appointment/store','AppointmentController@store')->name('appointment.store');

// Route::get('/getAppointment','AppointmentController@getAppointment')->name('getAppointment');

// Route::post('/searchPRN','AppointmentController@searchPRN')->name('searchPRN');
// Route::post('/confirmAppoints','AppointmentController@confirmAppoints')->name('confirmAppoints');

// Route::get('/noappointment/create','AppointmentController@noappointment')->name('noappointment.create');

// Route::post('/noappointmentStore','AppointmentController@noappointmentStore')->name('noappointmentStore');

// Route::delete('/appointmentCancel/{id}','AppointmentController@appointmentCancel')->name('appointmentCancel');

// booking end

// treatment record
Route::get('/patientRecordD/{did}/{pid}','TreatmentController@patientRecordD')->name('patientRecordD');

// medicales create by OwnerControlle

Route::get('/med','MedicineController@medicineCreateByOwner')->name('medName');
Route::get('/getmed','MedicineController@getmed')->name('getmed');
Route::post('/ss','MedicineController@stockStore')->name('stock.store');

Route::get('/getm','MedicineController@getMeds');

Route::get('/monthlyStock','MedicineController@monthlyStock');






























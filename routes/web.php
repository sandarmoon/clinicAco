<?php

use App\Doctor;
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

Route::get('/dashboard','ExpenseController@superadmindashboard')->name('dashboard')->middleware('auth');


Route::group(['middleware' => ['auth','role:Reception|Super_Admin']], function () {
	// dashboard
	
Route::get('/rdashboard', 'ReceptionController@dashboard')->name('rdashboard');
    // booking
    Route::get('appointment/create','AppointmentController@create')->name('appointment.create');




	Route::post('/getToken','AppointmentController@getToken')->name('getToken');

	Route::post('appointment/store','AppointmentController@store')->name('appointment.store');

	Route::get('/getAppointment','AppointmentController@getAppointment')->name('getAppointment');

	Route::get('/todayBoodking/{did}','AppointmentController@todayBoodking')->name('todayBoodking');
	Route::get('/todayAppointment','AppointmentController@todayAppointment')->name('todayAppointment');
	Route::get('/toggleDelay/{aid}/{value}','AppointmentController@toggleDelay')->name('toggleDelay');


	Route::post('/searchPRN','AppointmentController@searchPRN')->name('searchPRN');
	Route::post('/confirmAppoints','AppointmentController@confirmAppoints')->name('confirmAppoints');

	Route::get('/noappointment/create','AppointmentController@noappointment')->name('noappointment.create');

	Route::post('/noappointmentStore','AppointmentController@noappointmentStore')->name('noappointmentStore');

	Route::delete('/appointmentCancel/{id}','AppointmentController@appointmentCancel')->name('appointmentCancel');
});


Route::group(['middleware' => ['auth','role:Admin|Doctor|Super_Admin|Reception']], function () {

Route::get('/',function(){
	$user=Auth::user();
	if($user->hasRole('Admin')){
		return redirect('/ownerDashboard');
	}elseif($user->hasRole('Super_Admin')){
		return redirect('/dashboard');
	}elseif ($user->hasRole('Doctor')) {
		return redirect('/ddashboard');
	}else{
		return redirect('/rdashboard');
	}
});
Route::get('/ownerDashboard', 'ExpenseController@index');

});
// Route::get('/', 'ExpenseController@index')->middleware('auth');
Route::get('/ddashboard', 'DoctorController@dashboard')->name('ddashboard')->middleware('auth');
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

Route::put('/treatmentUpdateByDoctor/{treatment_id}','TreatmentController@treatmentUpdateByDoctor')->name('treatmentUpdateByDoctor');



});






Route::group(['middleware' => ['auth','role:Doctor|Super_Admin']], function () {
	Route::get('/appointpatient','AppointmentController@appointpatient')->name('appointpatient');
	//appointment of doctor
	// treatmentstart
	Route::get('/appointpatienthistory/{treatment_id}/{patient_id}','AppointmentController@patient')->name('appointpatienthistory');
});



Route::get('/getTreatments','TreatmentController@getTreatments')->name('getTreatments')->middleware('auth');

Route::resource('/referredDoctor','ReferredDoctorController')->middleware('auth');//doctor route






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
Route::resource('doctor','DoctorController')->middleware('auth');

Route::get('/getDoctor','DoctorController@getDoctor')->name('getDoctor');


//Patient
Route::resource('patient','PatientController')->middleware('auth');

Route::get('getTransferReport/{pid}','PatientController@getTransferReport')->name('getTransferReport')->middleware('auth');

Route::post('incharge','PatientController@incharge')->name('incharge')->middleware('auth');

Route::resource('reception','ReceptionController')->middleware('auth');//reception

Route::get('print','PrintOutController@index')->name('print');//reception


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Profit-expense
Route::resource('/expense','ExpenseController')->middleware('auth');

Route::get('/getExpense','ExpenseController@getExpense')->name('getExpense')->middleware('auth');
Route::post('/searchReport','ExpenseController@searchReport')->name('searchReport')->middleware('auth');

// AppointmentPatient

Route::get('/appointpatient','AppointmentController@appointpatient')->name('appointpatient')->middleware('auth');
//appointment of doctor
// treatmentstart
Route::get('/appointpatienthistory/{treatment_id}/{patient_id}','AppointmentController@patient')->name('appointpatienthistory')->middleware('auth');
Route::post('/appmedicine','AppointmentController@getmedicine')->name('appmedicine')->middleware('auth');
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
Route::get('/patientRecordD/{did}/{pid}','TreatmentController@patientRecordD')->name('patientRecordD')->middleware('auth');

Route::get('/getreason/{did}/{pid}','TreatmentController@getreason')->name('getreason');

// medicales create by OwnerControlle

Route::get('/med','MedicineController@medicineCreateByOwner')->name('medName')->middleware('auth');
Route::get('/getmed','MedicineController@getmed')->name('getmed');
Route::post('/ss','MedicineController@stockStore')->name('stock.store');

Route::get('/getm','MedicineController@getMeds')->name('getm');

Route::get('/monthlyStock','MedicineController@monthlyStock');

// =================================================================
// schedule start
Route::resource('/schedule','ScheduleController');
// =================================================================
// schedule end


// monthlymedinciestock start
Route::get('/checkMonthlyMedAdding','MedicineController@checkMonthlyMedAdding')->name('checkMonthlyMedAdding');
// monthlymedinciestock end


// for password reset()

Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');

// for monthly usage medicine

Route::get('/getMonghtlyuseageMedicine','MedicineController@getMonghtlyuseageMedicine')->name('getMonghtlyuseageMedicine');



// for changes view for reception start

Route::get('patientlistforRec', function(){
	  $id=Auth::user()->receptions[0]->owner->id;
      $doctors=Doctor::where('owner_id',$id)->get();
	return view('patients.patientlistforRec',compact('doctors'));
})->name('patientlistforRec');

Route::get('/getpatientlistforRec','PatientController@getpatientlistforRec')->name('getpatientlistforRec');

Route::get('/getpatientlistforRecforSingleDoctor','PatientController@getpatientlistforRecforSingleDoctor')->name('getpatientlistforRecforSingleDoctor');


Route::post('/makingTreatmentwithPRN','TreatmentController@makingTreatmentwithPRN')->name('makingTreatmentwithPRN');

// for changes view for reception end 

// for owner expense report view  start
 Route::get('/expenseList','ExpenseController@expenseList')->name('expenseList');

 Route::get('/sampleReport','ExpenseController@sampleReport')->name('sampleReport');
 Route::get('/report','ExpenseController@report')->name('report');
 Route::post('/getexpenseReport','ExpenseController@getexpenseReport')->name('getexpenseReport');
 Route::post('/filterExpensbyCategory','ExpenseController@filterExpensbyCategory')->name('filterExpensbyCategory');

Route::post('/printIncomeListpdf','PdfController@printIncomeListpdf')->name('printIncomeListpdf');

Route::get('/bill-check-out/{pid}','PatientController@billCheckOut')->name('bill-check-out');


// for owner expense report view  end 

Route::post('/exportExcel','ExpenseController@exportExcel')->name('exportExcel');

// for testing pdf generate start
 Route::get('pdf-create-treatment-report/{id}','PdfController@createTreatmentReport')->name('pdf-create-treatment-report');
















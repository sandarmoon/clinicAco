<?php

use Illuminate\Http\Request;
use App\Medicines;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->group( function () {
	// Route::resource('treatment', 'Api\TreatmentController');
// });
// // ==============Owner======================================================
// Route::apiresource('/owners','Api\OwnerController');

// // ==============Reception======================================================
// Route::apiresource('/reception','Api\ReceptionController');

// // ==============Treatment======================================================
// Route::apiresource('/treatment','Api\TreatmentController')->middleware('auth:api');
Route::get('/incharge','Api\TreatmentController@index')->middleware('auth:api');
 Route::get('medicines','Api\TreatmentController@medicine')->middleware('auth:api');

Route::get('doctor/patient','Api\TreatmentController@getPatientBydoctorid')->middleware('auth:api');

Route::put('/treatment/{id}','Api\TreatmentController@madeTreatment')->middleware('auth:api');

// for login
Route::post('/login','Api\AuthController@login');

// // ==============Reception Management======================================================
Route::middleware('auth:api')->group( function () {

	Route::resource('patient', 'Api\PatientController');

	Route::get('/doctors','Api\ReceptionController@getDoctor');

	//for gettoken with  appointment date and doctotid which is post
	Route::post('/token','Api\ReceptionController@generateToken');

	//making a new appointment after getting token
	Route::post('/appointment','Api\ReceptionController@makeAppointment');

	//get prn number to get appointment
	Route::get('/searchprn/{prn}','Api\ReceptionController@searchPRN');

	Route::post('/confirmAppintment','Api\ReceptionController@confirmAppintment');

});
// // ==============Reception Management End======================================================




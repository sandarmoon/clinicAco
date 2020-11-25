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



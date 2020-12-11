<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reception;
use App\Appointment;
use App\Treatment;
use App\Patient;
use App\Referreddoctor;
use App\Doctor;
use App\Http\Resources\ReceptionResource;
use App\Http\Resources\Api\PatientResource;
use App\Http\Resources\Api\DoctorResource;
use Auth;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $receptions=Reception::all();
        return ReceptionResource::collection($receptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     //get all doctor of clinic that reception  work at that clinic
    public function getDoctor(){
        $ownerid=Auth::user()->receptions[0]->owner->id;
        $doctors=Doctor::where('owner_id',$ownerid)->get();
        return $this->sendResponse(DoctorResource::collection($doctors), ' Doctors are retrieved!');

    }

    public  function generateToken(Request $request){
       $token=Appointment::where('doctor_id',$request->id)
            ->where('A_Date','=',$request->date)->orderBy('id','desc')->first();
            // dd($token);
        $no=1;
        if($token==null){
            $token=$no;
        }else{
            $token= ++$token->TokenNo;
        }

        return response()->json([
            
            'tokenNo' => $token,
            
        ],200);
    }

    public function makeAppointment(Request $request){
        $name=$request->name;
        $phone=$request->phone;
        $token=$request->token;
        $doctor_id=$request->id;
        $A_date=$request->date;

        $appointment=Appointment::create([
            'name'=>$name,
            'phone'=>$phone,
            'doctor_id'=>$doctor_id,
            'A_Date'=>$A_date,
            'TokenNo'=>$token,
        ]);

         return $this->sendResponse($appointment, 'Appointment is successtully added');
    }

    public function searchPRN($prn){
        $patient_id=Patient::where('PRN',$prn)->first();
         return $this->sendResponse($patient_id, 'data with prn is success' );
    }

    public function confirmAppintment(Request $request){

        $doctor_id=$request->doctor_id;
        $patient=$request->patient_id;
        $appointment=$request->appointment_id;
       $appointment= Appointment::find($appointment);
       $appointment->status=1;
       $appointment->save();

      // $treatment=new Treatment;
      //    $treatment->patient_id=$patient;
      //    $treatment->doctor_id=$doctor_id;
      //    $treatment->charges=0;
      //    $treatment->save();
       Treatment::create([
            'patient_id'=>$patient,
            'doctor_id'=>$doctor_id,
            'charges'=>0
            ]);

          return response()->json([
            
            'message' => 'confirmed successtully',
            
        ],200);

    }

    public function assignedDoctor(Request $request){
        $prn=$request->prn;
        $assignment=Referreddoctor::whereHas('patient',function($q)use($prn){
            $q->where('PRN',$prn);
        })->whereNull('to_doctor_id')
        ->orderBy('created_at','desc')->first();
        if(!empty($assignment)){
          return $this->sendResponse($assignment, 'Success');  
      }else{
        $assignment=[];
        return $this->sendResponse($assignment, 'No data found');
      }
       
    }

    public function completeAssignment($aid,$todid){
         $assignedDoc=Referreddoctor::find($aid);
            $assignedDoc->to_doctor_id=$todid;
            $assignedDoc->save();

            return response()->json(['success'=>'Successfully Doctor Changing!']);
    }
}

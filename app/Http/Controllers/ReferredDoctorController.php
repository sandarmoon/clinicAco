<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referreddoctor;

class ReferredDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $fromDoctor=$request->fromDoctor;
         $toDoctor=$request->toDoctor;

         $patient_id=$request->patient_id;
         $reason=$request->reason;

        $assignedDoc=Referreddoctor::where('to_doctor_id',$fromDoctor)
                        ->where('patient_id',$patient_id)
                        ->first();
        if($assignedDoc!=null){
            $assignedDoc=Referreddoctor::find($assignedDoc->id);
            $assignedDoc->status=0;
            $assignedDoc->save();    
        }

            Referreddoctor::create([
                'from_doctor_id'=>$fromDoctor,
                'to_doctor_id'=>$fromDoctor,
                'patient_id'=>$patient_id,
                'reason'=>$reason
             ]);
         
         return response()->json(['success'=>'Successfully Doctor Changing!']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}

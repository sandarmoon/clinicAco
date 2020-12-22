<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use App\Patient;
use App\Referreddoctor;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\TreatmentResource;
use Auth;
use App\Doctor;
use Carbon;
class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if($user->hasRole('Doctor')){
           $doctor=Doctor::where('user_id',$user->id)->first();
            $doctor_id=$doctor->id;
            // $treatments=Treatment::where('doctor_id',$doctor_id)->get();
            $treatments=Treatment::where('doctor_id',$doctor_id)->
                     whereNotNull('gc_level')->
                      orderBy('created_at','ASC')->get()->unique('patient_id');
            // dd('no');
        
        }
       elseif($user->hasRole('Reception')){
            $uid=Auth::user()->receptions[0]->owner_id;
            $treatments=Treatment::whereHas('doctor',function($q)use($uid){
                $q->where('owner_id',$uid);
            })->
            whereNotNull('gc_level')->
                      orderBy('created_at','ASC')->get()->unique('patient_id');
            // dd($treatments);
            
        }else{
            $treatments=[];
        }
        // dd($treatments);
         return view('treatment.index',compact('treatments'));
        // start here
        // $id=Auth::user()->id;
        // $doctor=Doctor::where('user_id',$id)->first();
        // $doctor_id=$doctor->id;
        // $treatments=Treatment::where('doctor_id',$doctor_id)->get();
        // dd($treatments);
        // return view('treatment.index',compact('treatments'));
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

        //dd($request);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
       
    //      // doctor must login first for only doctor use
    //     // $user_id=Auth::user()->id;
    //     // $doctor=Doctor::where('user_id',$user_id)->first();
    //     // $doctor_id=$doctor->id;
    //     $doctors=Doctor::all();
    //     $user=Auth::user();
    //     if($user->hasRole('Doctor')){
    //        $doctor=Doctor::where('user_id',$user->id)->first();
    //         $doctor_id=$doctor->id;
    //         $treatments=Treatment::where('patient_id','=',$id)
    //             ->where('doctor_id','=',$doctor_id)
    //             ->get();
    //         // dd($treatments);
        
    //     }else{
    //         $treatments=Treatment::where('patient_id','=',$id)
    //             ->get();
    //         // dd($treatments);
            
    //     }

        

         

        
    //     // $treatments=Treatment::where('patient_id','=',$id)
    //     //         ->where('doctor_id','=',$doctor_id)
    //     //         ->get();
    //             // dd($treatments);
        
    //     return view('patients.healthRecord',compact('treatments','doctors'));
    // }

    // public function show22($id){
    //     // patient>id=$id
    //     $patientinfo=Treatment::with('patient')->first();
    //     // dd($patientinfo);
        
    //     $chargeDoctor = Treatment::select('doctor_id')->where('patient_id',$id)->distinct()->get();

    //      $uniquedoctorT = Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get()->unique('doctor_id');

    //      $medicinerecord=Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get();
         

        

    //     $treatments=Treatment::where('patient_id','=',$id)
    //                  ->get();
    //                  return view('patients.healthRecordHome',compact('treatments','patientinfo','chargeDoctor','uniquedoctorT'));
    // }

     public function show($id){
        // $id=Auth::user()->receptions[0]->owner_id;
        $doctors=Doctor::all();
         $user=Auth::user();

         //Note:: doctor assigned and old assigned filter
        if($user->hasRole('Doctor')){
            // dd('yes you are doctor');
           $doctor=Doctor::where('user_id',$user->id)->first();
            $doctor_id=$doctor->id;

            $lastassginP=Referreddoctor::
                        where('patient_id',$id)
                        ->orderBy('created_at','DESC')->first();
                        
            $assignedDoc=Referreddoctor::where('to_doctor_id',$doctor_id)
                        ->where('patient_id',$id)
                        ->orderBy('created_at','DESC')->first();
             // dd($lastassginP);
            
              // dd($assignedDoc);//null  mean that you are not assigned by someone
            if($assignedDoc!=null){ 
                 // dd('helo1');//This login doctor is assigned by someoone

                if($lastassginP->to_doctor_id == $assignedDoc->to_doctor_id){
                      // dd('helo2');
                    // dd("yes You are lastest assigned");

                    $patientinfo=Treatment::with('patient')->where('patient_id',$id)->first();
                     // dd($patientinfo);
                    
                    $chargeDoctor = Treatment::select('doctor_id')->where('patient_id',$id)->distinct()->get();

                     

                     $medicinerecord=Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get();
                     
                     //  $uniquedoctorT = Treatment::where('patient_id',$id)->
                     // whereNotNull('gc_level')->
                     //  orderBy('created_at','ASC')->get()->unique('doctor_id');

                      $uniquedoctorT = Treatment::where('patient_id',$id)->
                     whereNotNull('gc_level')->
                      orderBy('created_at','DESC')->get()->unique('doctor_id');
                    
                      // dd($uniquedoctorT);
                    $treatments=Treatment::where('patient_id','=',$id)
                                 ->get();
                    return view('patients.healthRecordHome',compact('treatments','patientinfo','chargeDoctor','uniquedoctorT'));

                }else{
                       // dd('helo3');
                      if($assignedDoc->status==0){

                        $dolastassgin=Referreddoctor::where('from_doctor_id',$assignedDoc->to_doctor_id)
                        ->where('patient_id',$assignedDoc->patient_id)
                        ->orderBy('created_at','DESC')
                        ->first();
                        // dd($dolastassgin);
                         $status=$assignedDoc->status;
                           $removeDate=$dolastassgin->created_at;
                            // dd($assignedDoc);
                           $uniquedoctorT=
                           Treatment::whereDate('created_at','<=',$removeDate)
                        ->where('patient_id',$id)
                        ->orderBy('created_at','DESC')
                        ->get()->unique('doctor_id');

                            // dd($uniquedoctorT);

                            $patientinfo=Treatment::with('patient')
                            ->where('patient_id',$id)
                            ->first();
                        // dd($patientinfo);
                        
                        $chargeDoctor = Treatment::select('doctor_id')->where('patient_id',$id)->distinct()->get();

                         

                         $medicinerecord=Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get();
                         
                         //  $uniquedoctorT = Treatment::where('patient_id',$id)->
                         // whereNotNull('gc_level')->
                         //  orderBy('created_at','ASC')->get()->unique('doctor_id');

                         //  $uniquedoctorT = Treatment::where('patient_id',$id)->
                         // whereNotNull('gc_level')->
                         //  orderBy('created_at','ASC')->get()->unique('doctor_id');
                        
                          // dd($uniquedoctorT);
                        $treatments=Treatment::where('patient_id','=',$id)
                                     ->get();
                        return view('patients.healthRecordHome',compact('treatments','patientinfo','chargeDoctor','uniquedoctorT'));

                      }else{
                        dd('no it is not');
                      }
                    // dd("no your are not last assgined but old assigned!");
                    // if($lastassginP0->status==$assignedDoc->status){
                    //     $status=$assignedDoc->status;
                    //    $removeDate=$assignedDoc->created_at;
                    //    $uniquedoctorT=
                    //    Treatment::whereDate('created_at','<',$removeDate)
                    //     ->where('patient_id',$id)
                    //     ->orderBy('created_at','ASC')
                    //     ->get()->unique('doctor_id');

                    //     $patientinfo=Treatment::with('patient')->first();
                    // // dd($patientinfo);
                    
                    // $chargeDoctor = Treatment::select('doctor_id')->where('patient_id',$id)->distinct()->get();

                     

                    //  $medicinerecord=Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get();
                     
                    //  //  $uniquedoctorT = Treatment::where('patient_id',$id)->
                    //  // whereNotNull('gc_level')->
                    //  //  orderBy('created_at','ASC')->get()->unique('doctor_id');

                    //  //  $uniquedoctorT = Treatment::where('patient_id',$id)->
                    //  // whereNotNull('gc_level')->
                    //  //  orderBy('created_at','ASC')->get()->unique('doctor_id');
                    
                    //   // dd($uniquedoctorT);
                    // $treatments=Treatment::where('patient_id','=',$id)
                    //              ->get();
                    // return view('patients.healthRecordHome',compact('treatments','patientinfo','chargeDoctor','uniquedoctorT'));

                    //     // return view('patients.healthRecord',compact('treatments','doctors','status'));
                    // }
                }


                

            }else{
                // dd('yew you. are not asigned');
                //doctor whos is not assgned by other doctor

                // $lastassginP=Referreddoctor::
                //         where('patient_id',$id)
                //         ->orderBy('created_at','DESC')->first();
            // $assignedDoc=Referreddoctor::where('from_doctor_id',$doctor_id)
            //             ->where('patient_id',$id)
            //             ->orderBy('created_at','DESC')->first();




                $treatments=Treatment::where('patient_id','=',$id)
                ->where('doctor_id','=',$doctor_id)
                ->get();
                return view('patients.healthRecord',compact('treatments','doctors'));
            }
           


        
        }
        // patient>id=$id and recption counter can see it!
        $patientinfo=Treatment::with('patient')
        ->where('patient_id',$id)
        ->first();
        // dd($patientinfo);
        
        $chargeDoctor = Treatment::select('doctor_id')->where('patient_id',$id)->distinct()->get();

         

         $medicinerecord=Treatment::where('patient_id',$id)->orderBy('created_at','ASC')->get();
         
          $uniquedoctorT = Treatment::where('patient_id',$id)
            ->whereNotNull('gc_level')
            ->orderBy('created_at','DESC')->get()->unique('doctor_id');
        

        $treatments=Treatment::where('patient_id','=',$id)
                     ->get();

                     return view('patients.healthRecordHome',compact('treatments','patientinfo','chargeDoctor','uniquedoctorT'));

    }

    // public function patientRecordD($did,$pid){
    //      $user=Auth::user();
    //     $doctors=Doctor::all();
    //     $lastassginP=Referreddoctor::
    //                     where('patient_id',$pid)
    //                     ->orderBy('id','DESC')->first();

    //     $assignedDoc=Referreddoctor::where('to_doctor_id',$did)
    //                 ->where('patient_id',$pid)
    //                 ->orderBy('created_at','DESC')->first();

    //                 // $removeDate=$assignedDoc->created_at;
    //                  dd($assignedDoc);

    //                 if($assignedDoc->to_doctor_id==$lastassginP->to_doctor_id && $assignedDoc->status==1){
    //                     dd('yes');
    //                 }else{
    //                     dd('no');
    //                 }

    //    $treatments=Treatment::where('patient_id','=',$pid)
    //             ->where('doctor_id','=',$did)
    //             ->get();
    //              return view('patients.healthRecord',compact('treatments','doctors'));
    // }


     public function patientRecordD($did,$pid){

         $role=Auth::user()->roles[0];
       // dd( Auth::user()->owners(0);
        

          $user=Auth::user();
          if($user->hasRole('Doctor')){
             $doctors=Doctor::where('owner_id',Auth::user()->doctors[0]->owner_id)->get();
             $doctor=Doctor::where('user_id',$user->id)->first();
            $doctor_id=$doctor->id;
            $lastassginP=Referreddoctor::
                        where('patient_id',$pid)
                        ->orderBy('id','DESC')->first();
             $assignedDoc=Referreddoctor::where('to_doctor_id',$doctor_id)
                    ->where('patient_id',$pid)
                    ->orderBy('created_at','DESC')->first();

                    if($assignedDoc!=null){ 
                 // dd('helo1');//This login doctor is assigned by someoone

                        if($lastassginP->to_doctor_id == $assignedDoc->to_doctor_id){
                             $treatments=Treatment::where('patient_id','=',$pid)
                            ->where('doctor_id','=',$did)
                            ->orderBy('id','desc')
                            ->get();
                             return view('patients.healthRecord',compact('treatments','doctors'));
                         }else{

                            

                            $dolastassgin=Referreddoctor::where('from_doctor_id',$assignedDoc->to_doctor_id)
                                ->where('patient_id',$assignedDoc->patient_id)
                                ->orderBy('created_at','DESC')
                                ->first();
                                 $removeDate=$dolastassgin->created_at;
                             // dd($dolastassgin);
                             $treatments=Treatment::where('patient_id','=',$pid)
                             ->whereNotNull('gc_level')
                            ->where('doctor_id','=',$did)
                            ->whereDate('created_at','<=',$removeDate)
                             ->orderBy('created_at','desc')
                            ->get();
                            // dd($treatments);
                             return view('patients.healthRecord',compact('treatments','doctors'));
                         }
                    }


          }else if($user->hasRole('Reception')){

                 $id=Auth::user()->receptions[0]->owner_id;
                 $doctors=Doctor::where('owner_id',$id)->get();
                 $treatments=Treatment::where('patient_id','=',$pid)
                    ->whereNotNull('gc_level')
                    ->where('doctor_id','=',$did)
                    ->orderBy('created_at','desc')
                    ->get();
                     return view('patients.healthRecord',compact('treatments','doctors'));
          }else{

              // $id=Auth::user()->receptions[0]->owner_id;
             // $doctors=Doctor::where('owner_id',$id)->get();
            $doctors=Doctor::all();
             $treatments=Treatment::where('patient_id','=',$pid)
                ->whereNotNull('gc_level')
                ->where('doctor_id','=',$did)
                ->orderBy('created_at','desc')
                ->get();
                 return view('patients.healthRecord',compact('treatments','doctors'));
          }

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
        

        $request->validate([
             'gc'=>'required',
             'complaint' =>'required',
             'diagnosis' =>'required',
             'charges' =>'required|numeric',
         ]);

          if($request->hasfile('file'))
        {
            $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $file->move($upload_dir, $name);
               $path[] = $upload_dir . $name;
            }
        }else{
            $path=null;
        }
        //dd(request('temperature'));
        $treatment=Treatment::find($id); 
        $treatment->file=json_encode($path);
        $treatment->gc_level=request('gc');
        $treatment->temperature=request('temperature');
        $treatment->body_weight=request('bodyWeight');
        $treatment->spo2=request('spo2');
        $treatment->pr=request('pr');
        $treatment->bp=request('bp');
        $treatment->rbs=request('rbs');
        $treatment->complaint=request('complaint');
        $treatment->examination=request('onexam');
        $treatment->relevant_info=request('relevantinfo');
        $treatment->chronic_disease=request('ud');
        $treatment->diagnosis=request('diagnosis');
        $treatment->external_medicine=request('externalMedicine');
        $treatment->next_visit_date=request('nextVisitDate1');
        $treatment->next_visit_date2=request('nextVisitDate2');
        $treatment->charges=request('charges');
        

        $treatment->save();
        if(!empty(request('drugs'))){
            $drugs=json_decode(request('drugs'));
            // dd(request('drugs'));
            foreach ($drugs as $key => $drug) {
                $tab=$drug->tab;
                //dd($tab);
                $time=$drug->time;
                $bf=$drug->bf;
                $duration=$drug->duration;
            $treatment->medicines()->attach($drug->drugid,['tab' => $tab, 'interval' => $time,'meal'=>$bf,'during'=>$duration]);     
            }
        }
        
        //dd(($drugs));
        if(request('injections')){

        $injections=json_decode(request('injections'));

        foreach ($injections as $key => $injection) {
           $type=$injection->injectiontype;
        $treatment->medicines()->attach($injection->injectionid,['type' => $type]);     
        }
        }

        if(!empty(request('reason'))){
            $reason=request('reason');
            $fromDoctor=$treatment->doctor_id;
            $patient_id=$treatment->patient_id;
            $assignedDoc=Referreddoctor::where('to_doctor_id',$fromDoctor)
                        ->where('patient_id',$patient_id)
                        ->first();
                // if($assignedDoc==null){
                //     Referreddoctor::create([
                //         'from_doctor_id'=>$fromDoctor,
                //         'to_doctor_id'=>null,
                //         'patient_id'=>$patient_id,
                //         'reason'=>$reason
                //      ]);
                // }else{
                //     $assignedDoc->
                // }

                if($assignedDoc!=null){
                    $assignedDoc=Referreddoctor::find($assignedDoc->id);
                    $assignedDoc->status=0;
                    $assignedDoc->save();    
                }

                Referreddoctor::create([
                    'from_doctor_id'=>$fromDoctor,
                    'to_doctor_id'=>null,
                    'patient_id'=>$patient_id,
                    'reason'=>$reason
                 ]);
        }



         return response()->json(['success'=>'Record is successfully']);
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

    public function getTreatments(){
        // $treatments=Treatment::all();
        $user=Auth::user();
        if($user->hasRole('Doctor')){
           $doctor=Doctor::where('user_id',$user->id)->first();
            $doctor_id=$doctor->id;
            // $treatments=Treatment::where('doctor_id',$doctor_id)->get();
            // dd($treatments);
            $treatments=Treatment::where('doctor_id',$doctor_id)->
                     whereNotNull('gc_level')->
                     whereDate('created_at',Carbon::today())
                     
                    
                      ->orderBy('appointment_id')
                      ->get()->unique('patient_id');
        
        }else{
             $treatments=Treatment::whereNotNull('gc_level')->whereDate('created_at',Carbon::today())->
             orderBy('appointment_id')->
                      orderBy('created_at','ASC')->get()->unique('patient_id');
            // dd($treatments);
           
            
        }

        $treatments=TreatmentResource::collection($treatments);
         $treatments=Datatables::of($treatments)
                ->addIndexColumn()
                ->make(true);
                return $treatments;
    }

    public function getreason($did,$pid){
         
                 $referred=Referreddoctor::where('from_doctor_id',$did)
                        ->where('patient_id',$pid)
                        ->whereDate('created_at',Carbon::today())
                        ->first();
        return $referred;
    }
}

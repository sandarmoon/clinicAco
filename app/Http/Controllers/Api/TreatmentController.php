<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Treatment;
use App\Medicine;
use App\Appointment;
use Carbon\Carbon;
use Auth;
use App\Http\Resources\Api\TreatmentResource;
use App\Http\Resources\Api\PatientResource;
use App\Http\Resources\Api\MedicineResource;
use App\Doctor;
use App\Patient;
use App\Referreddoctor;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $id=Auth::user()->doctors[0]->id;

        // $id=1;
         // old query
            // $patient=Patient::
            // whereHas('treatments',function($q) use ($id){
            //   //$q->whereDate('created_at',Carbon::today())
            //    $q->where('doctor_id','=',$id)
            //     ->whereNull('gc_level');
            // })->with(['treatments'=>function($q){
            //     $q->whereNotNull('gc_level');
            // }])-> first();
        //end query

          // $patients=Patient::
          //   whereHas('treatments',function($q) use ($id){
          //     //$q->whereDate('created_at',Carbon::today())
          //      $q->where('doctor_id','=',$id)
          //       ->orderBy('appointment_id')
          //        ->whereNull('gc_level');
               

          //   })->with('appointment')->get();

         $patients=Appointment::whereHas('treatment',function($q) use ($id){
              $q->whereDate('created_at',Carbon::today())
               ->where('doctor_id','=',$id)
                 ->whereNull('gc_level');
            })->with('treatment.patient.treatments')
         ->orderBy('TokenNo','ASC')
         ->where('status','=',1)
         ->get();
           
           // return $patients;

         // $patients=Treatment::with(['appointment'=>function($e){
         //  $e->where('status','1');
            
         // }])->orderBy('appointment.TokenNo','ASC')
         // ->where('doctor_id',$id)->get();

         // return $patients;


         // $patients=Patient::with(['treatments'=>function($q){
         //    $q->with(['appointment'=>function($query){
         //        $query->orderBy('TokenNo','ASC');
         //    }]);
         // }])
         // $patients=Patient::whereHas('treatments',function($q) use ($id){
         //      $q->whereDate('created_at',Carbon::today())
         //        ->where('doctor_id','=',$id)
         //         ->whereNull('gc_level');
               
         //    })->orderBy('appointment_id','ASC')

         // ->get();


              
         // return $patients;


            
               $patient=$patients[0]->treatment->patient;
            

         // dd($patients);
       if($patient!=null){
         return $this->sendResponse(new PatientResource($patient), 'Treatment retrieved successfully.');
     }else{
       return response()->json([
            'status' => 'ok',
            'data' => $patient,
            'message' => 'no data is found!'
        ]);
     }
        
       
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
    // public function update(Request $request, $id)
    // {
        
    //     $authid=Auth::user()->doctors[0]->id;
    //       $request->validate([
    //          'gc'=>'required',
    //          'complaint' =>'required',
    //          'diagnosis' =>'required',
    //          'charges' =>'required|numeric',
    //      ]);

    //         if($request->hasfile('file'))
    //     {
    //         $upload_dir = 'storages/files/';

    //         $files = $request->file('file');
    //         foreach($files as $file)
    //         {
    //             $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
    //             $file->move($upload_dir, $name);
    //            $path[] = $upload_dir . $name;
    //         }
    //     }else{
    //         $path=null;
    //     }

    //     $treatment=Treatment::where('patient_id',$id)
    //                         ->where('doctor_id',$authid)
    //                         ->whereDate('created_at',Carbon::today())
    //                         ->whereNull('gc_level')->first(); 
    //      // dd($treatment);

    //     $treatment->file=json_encode($path);
    //     $treatment->gc_level=request('gc');
    //     $treatment->temperature=request('temperature');
    //     $treatment->body_weight=request('bodyWeight');
    //     $treatment->spo2=request('spo2');
    //     $treatment->pr=request('pr');
    //     $treatment->bp=request('bp');
    //     $treatment->rbs=request('rbs');
    //     $treatment->complaint=request('complaint');
    //     $treatment->examination=request('onexam');
    //     $treatment->relevant_info=request('relevantinfo');
    //     $treatment->chronic_disease=request('ud');
    //     $treatment->diagnosis=request('diagnosis');
    //     $treatment->external_medicine=request('externalMedicine');
    //     $treatment->next_visit_date=request('nextVisitDate1');
    //     $treatment->next_visit_date2=request('nextVisitDate2');
    //     $treatment->charges=request('charges');
    //     $treatment->save();
    //     $drugs=json_decode(request('drugs'));

    //     //dd(($drugs));
    //     foreach ($drugs as $key => $drug) {
    //         $tab=$drug->tab;
    //         //dd($tab);
    //         $time=$drug->time;
    //         $bf=$drug->bf;
    //         $duration=$drug->duration;
    //     $treatment->medicines()->attach($drug->drugid,['tab' => $tab, 'interval' => $time,'meal'=>$bf,'during'=>$duration]);     
    //     }
    //     //dd(($drugs));
    //     if(request('injections')){

    //     $injections=json_decode(request('injections'));

    //     foreach ($injections as $key => $injection) {
    //        $type=$injection->injectiontype;
    //     $treatment->medicines()->attach($injection->injectionid,['type' => $type]);     
    //     }
    //     }

    //      return response()->json(['success'=>'Record is successfully']);
    // }

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

    public function medicine()
    {
         // $id=Auth::user()->doctor[0]->owner()->id;
        $id=Auth::user()->doctors[0]->owner->id;
        // $id=1;
        $medicines=Medicine::where('owner_id',$id)->get();
        if($medicines!=null){
         return $this->sendResponse(MedicineResource::collection($medicines), 'Medicines retrieved successfully.');
         }else{
           return response()->json([
                'message' => 'no data is found!'
            ],200);
         }
       
    }

    public function getPatientBydoctorid(){
          $id=Auth::user()->doctors[0]->id;
      
          $patients=Patient::
                    whereHas('treatments',function($q) use ($id){
                      $q
                      // ->whereDate('created_at',Carbon::today())
                      ->where('doctor_id','=',$id)
                      ->whereNotNull('gc_level');
                    })->with(['treatments'=>function($q){
                        $q->whereNotNull('gc_level');
                    }])-> get();
        // return $treatments;
        
        if($patients!=null){
         return $this->sendResponse(PatientResource::collection($patients), 'Patients retrieved successfully.');
         }else{
           return response()->json([
                'message' => 'no data is found!'
            ],404);
         }
    }

    public function madeTreatment(Request $request,$id){

         $authid=Auth::user()->doctors[0]->id;

          $request->validate([
             'gc'=>'required',
             'complaint' =>'required',
             'diagnosis' =>'required',
             'charges' =>'required|numeric',
         ]);
          // dd( $request->file('file'));
          
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
                
                $path=[];
            }

           



        $day=request('nextVisitDate1');
        if(!empty($day)){
            $dt=Carbon::today();
        $nextbook= $dt->addDay($day);
        }else{
            $nextbook=null;
        }
        
        
        // dd($nextbook);

        $treatment=Treatment::where('patient_id',$id)
                            ->where('doctor_id',$authid)
                            ->whereDate('created_at',Carbon::today())
                            ->whereNull('gc_level')->first(); 
         // dd($treatment);

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
        $treatment->next_visit_date= $nextbook;
        $treatment->charges=request('charges');
        $treatment->save();
        $drugs=json_decode(request('drugs'));

        //dd(($drugs));
        foreach ($drugs as $key => $drug) {
            $tab=$drug->tab;
            //dd($tab);
            $time=$drug->time;
            $bf=$drug->bf;
            $duration=$drug->duration;
        $treatment->medicines()->attach($drug->drugid,['tab' => $tab, 'interval' => $time,'meal'=>$bf,'during'=>$duration]);     
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
            $fromDoctor=$authid;
            $patient_id=$id;

            $assignedDoc=Referreddoctor::where('to_doctor_id',$fromDoctor)
                        ->where('patient_id',$patient_id)
                        ->first();

                if($assignedDoc==null){
                    Referreddoctor::create([
                        'from_doctor_id'=>$fromDoctor,
                        'to_doctor_id'=>null,
                        'patient_id'=>$patient_id,
                        'reason'=>$reason
                     ]);
                }else{
                    dd('yes it has');
                }
        }

         return response()->json([
                'status' => 'ok',
                'message' => 'Treatment Successful'
            ],200);


    }
}

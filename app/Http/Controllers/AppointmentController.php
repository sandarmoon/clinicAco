<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;
use Yajra\DataTables\Facades\DataTables;
use App\Patient;
use Carbon\Carbon;
use App\Medicine;
use App\Treatment;
use App\Reception;
use App\Doctor;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Referreddoctor;
use App\Appointment;
class AppointmentController extends Controller
{
    public function index(){
        
    }
    
    public function appointpatient()
    {
        $user1=Auth::user()->id;
        $user=Auth::user();

         //Note:: doctor assigned and old assigned filter
        if($user->hasRole('Doctor')){

            $doctor=Doctor::where('user_id',$user1)->first();
            //$patients=Patient::whereDate('created_at', Carbon::today())->get();
            $treatments=Treatment::select('treatments.*')
             ->join('appointments','appointments.id','=','appointment_id')
            ->where('appointments.status',1) 
            ->whereDate('treatments.created_at',Carbon::today())
            ->where('treatments.doctor_id','=',$doctor->id)
            ->where('treatments.gc_level',null)
            ->orderBy('appointments.TokenNo')
            ->get();
            // dd($treatments);

        }else{
            $treatments=Treatment::select('treatments.*')
             
             ->where('appointments.status',1) 
            ->whereDate('treatments.created_at',Carbon::today())

            ->where('treatments.gc_level',null)
            ->orderBy('treatments.doctor_id')
            ->orderBy('appointments.TokenNo')
            ->get();
        }
        

    	 // dd($treatments);
    	 return view('Appointment.index',compact('treatments'));
    }


    // public function patient(Request $request)
    // {
    //    $id=Auth::user()->doctors[0]->owner_id;
    //     $patient_id=request('patient_id');
    //     $treatment_id=request('treatment_id');
    // 	$patient=Patient::find($patient_id);
    //     //dd($treatment_id);
    //     $drugs=Medicine::
    //                 Where('medicinetype_id',1)->where('owner_id',$id)->get();
    //     //dd($drugs);
    //     $injections=Medicine::where('medicinetype_id',2)->where('owner_id',$id)->get();
    //     // dd($injections);
    //     $treatments=Treatment::where('patient_id',$patient_id)->where('gc_level','!=',null)->get();
    //    /* $treatmentdrugs= $treatments->medicines()
    //                      ->wherePivot('type', '!=', Null)
    //                      ->get();
    //     dd($treatmentdrugs);*/
    //    // dd($treatments);
    // 	 return view('Appointment.show',compact('patient','drugs','injections','treatments','treatment_id'));

    // }

    public function patient(Request $request)
    {

       $uid=Auth::user()->doctors[0]->owner_id;
        $patient_id=request('patient_id');
        $treatment_id=request('treatment_id');
        $patient=Patient::find($patient_id);
        //dd($treatment_id);
        $drugs=Medicine::
                    Where('medicinetype_id',1)->where('owner_id',$uid)->get();
        //dd($drugs);
        $injections=Medicine::where('medicinetype_id',2)->where('owner_id',$uid)->get();
        // dd($injections);

        // $treatments=Treatment::where('patient_id',$patient_id)
        //             ->where('gc_level','!=',null)
        //             ->get();

        // start here
            $user=Auth::user();
            $doctor=Doctor::where('user_id',$user->id)->first();
           
            $doctor_id=$doctor->id;
            // dd($doctor_id);
            $id=$patient->id;

            $lastassginP=Referreddoctor::
                        where('patient_id',$id)
                        ->orderBy('created_at','DESC')->first();
                        
            $assignedDoc=Referreddoctor::where('to_doctor_id',$doctor_id)
                        ->where('patient_id',$id)
                        ->orderBy('created_at','DESC')->first();
          // dd($lastassginP);
            
            if($assignedDoc!=null){ 
                //yes  you are assingned but still don't know last or not last 
                if($lastassginP->to_doctor_id == $assignedDoc->to_doctor_id){
                    //yes you are last

                    $treatments=Treatment::where('patient_id',$id)->
                     whereNotNull('gc_level')->
                      orderBy('created_at','DESC')->get();

                }else{
                    // yes you are not last
                    if($assignedDoc->status==0){
                        
                        $dolastassgin=Referreddoctor::where('from_doctor_id',$assignedDoc->to_doctor_id)
                        ->where('patient_id',$assignedDoc->patient_id)
                        ->orderBy('created_at','DESC')
                        ->first();

                            $status=$assignedDoc->status;
                           $removeDate=$dolastassgin->created_at;
                            // dd($removeDate);
                           $treatments=
                           Treatment::whereDate('created_at','<=',$removeDate)
                           ->whereNotNull('gc_level')
                        ->where('patient_id',$id)
                        ->orderBy('created_at','DESC')
                        ->get();

                    }else{
                        dd('helo2');
                    }
                }
            }else{
                //you  r frist for patient
                $treatments=Treatment::where('doctor_id',Auth::user()->doctors[0]->id)
                            ->whereNotNull('gc_level')
                            ->where('patient_id',$id)->get();

            }
        //end here
       
         return view('Appointment.show',compact('patient','drugs','injections','treatments','treatment_id'));

    }


    
    public function getmedicine(Request $request)
    {
        dd($request);
    }

    public function create(){

        $id=Auth::user()->id;
        $r_user=Reception::where('user_id',$id)->first();
        $doctors=Doctor::where('owner_id',$r_user->owner_id)->get();
        // dd($doctors);

        return view('Appointment.create',compact('doctors','r_user'));
    }

    public function getToken(Request $request){
     // dd($request);
        $token=Appointment::where('doctor_id',$request->id)
            ->where('A_Date','=',$request->date)->orderBy('id','desc')->first();
            // dd($token);
        $no=1;
        if($token==null){
            return $no;
        }else{
            return ++$token->TokenNo;
        }
        
    }


    public function store(Request $request){
        $name=$request->name;
        $phone=$request->phone;
        $token=$request->token;
        $doctor_id=$request->doctor_id;
        $A_date=$request->A_date;

        Appointment::create([
            'name'=>$name,
            'phone'=>$phone,
            'doctor_id'=>$doctor_id,
            'A_Date'=>$A_date,
            'TokenNo'=>$token,
        ]);

        return redirect('/appointment/create')->with('success',"Successfully added!");
    }

    public function getAppointment(){
        $appointments=Appointment::with(['doctor'=>function($q){
                                $q->orderBy('id');
                            }])
                            ->where('status','!=',1)
                            ->where('status','!=',2)
                            ->where('A_Date','>=',Carbon::today()->toDateString())
                            ->orderBy('created_at','ASC')
                            ->get();
       
        $all=AppointmentResource::collection($appointments);
         return Datatables::of($all)->addIndexColumn()->make(true);


    }

    public function todayBoodking($did){
        if($did ==0){
            $all=Appointment::whereHas('treatment',function($q){
              $q->whereDate('created_at',Carbon::today())
                     ->whereNull('gc_level');
                })->with(['treatment.patient.treatments','doctor.user'])
            ->orderBy('doctor_id')
             ->orderBy('TokenNo','ASC')
             ->where('status','!=',2)
             ->get();
         }else{
             $all=Appointment::whereHas('treatment',function($q)use($did){
              $q->whereDate('created_at',Carbon::today())
                    ->where('doctor_id',$did)
                     ->whereNull('gc_level');
                })->with(['treatment.patient.treatments','doctor.user'])
            ->orderBy('doctor_id')           
             ->orderBy('TokenNo','ASC')
             ->where('status','!=',2)
             ->get();
         }
       

         return Datatables::of($all)->addIndexColumn()->make(true);

    }


    public function todayAppointment(){
          $id=Auth::user()->receptions[0]->owner_id;
          // dd($id);
        $doctors=Doctor::where('owner_id',$id)->get();
        return view('Appointment.today',compact('doctors'));
    }

    public function searchPRN(Request $request){
         $id=Auth::user()->receptions[0]->owner_id;
        $PRN= $request->PRN;
        $patient=Patient::whereHas('reception',function($q)use ($id){
            $q->where('owner_id',$id);
        })
        ->where('PRN','=',$PRN)
        ->first();
        // if($patient ==null){
        //     return response()->json([
        //         'success' => 'Patient Not Found'
        //     ]);
        // }else{
        //      return response()->json([
        //         'success' => $patient
        //     ]);
        // }
        echo $patient;
        
    }

    public function confirmAppoints(Request $request){
        // dd($request);
        $doctor_id=$request->doctor;
        $patient=$request->patient;
        $appointment=$request->a;
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
            'charges'=>0,
            'appointment_id'=>$appointment->id
            ]);

         return response()->json([
                'success' => 'added Successfully'
            ]);

    }


    public function noappointment(){
        $id=Auth::user()->id;
        $r_user=Reception::where('user_id',$id)->first();
        $doctors=Doctor::where('owner_id',$r_user->owner_id)->get();
        return view('Appointment.noappointment',compact('doctors'));
    }

    public function noappointmentStore(Request $request){
        $token=$request->token;
        $A_Date=$request->A_Date;
        $characters = '0123456789';
        $string = '';
         $max = strlen($characters) - 1;

         for ($i = 0; $i < 5; $i++){
              $string .= $characters[mt_rand(0, $max)];
         }
         $prn=$string;

        $request->validate([
            'name'=>'required',
            'fathername'=>'required',
            'age'=>'required|numeric',
            'child'=>'required',
            'gender'=>'required',
            'phoneno'=>'required|numeric',
            'address'=>'required',
            'married'=>'required',
            'pregnant'=>'required',
            'weight'=>'required',
            'allergy'=>'required',
            'job'=>'required',
            'file.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000'
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
            $path=[];
        }
    // $doctor_id=Doctor::first()->value('id');
    // dd($doctor_id);
    //dd($path);

    $doctor_id=request('doctor_id');
     $patient=new Patient;
     $patient->PRN=$prn;
     $patient->name= request('name');
     $patient->fathername=request('fathername');
     $patient->age=request('age');
     $patient->child=request('child');
     $patient->gender=request('gender');
     $patient->phoneno=request('phoneno');
     $patient->address=request('address');
     $patient->married_status=request('married');
     $patient->status=0;
     $patient->pregnant=request('pregnant');
     $patient->body_weight=request('weight');
     $patient->allergy=request('allergy');
     $patient->job=request('job');
     $patient->file=json_encode($path);
     $patient->reception_id=1;
     $patient->save();
     $a=Appointment::create([
            'name'=>$request->name,
            'phone'=>$request->phoneno,
            'doctor_id'=>$doctor_id,
            'A_Date'=>$A_Date,
            'TokenNo'=>$token,
            'status'=>1
        ]);

     $treatment=new Treatment;
     $treatment->doctor_id=$doctor_id;
     $treatment->patient_id=$patient->id;
     $treatment->charges=0;
     $treatment->appointment_id=$a->id;
     $treatment->save();
     return redirect()->route('appointment.create');
    }

    public function appointmentCancel($id){
        // dd($id);
        $appointment=Appointment::find($id);
        $appointment->status=2;
        $appointment->save();

        return response()->json(['success'=>'Successfully deleted']);
    }

    public function toggleDelay($aid,$value){

       $a=Appointment::find($aid);
       $a->status=$value;
       $a->save();
        return response()->json(['success'=>'Successfully updated']);
    }
     public function destroy($id)
    {
        
    }
}

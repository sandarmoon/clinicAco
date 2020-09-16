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
            $treatments=Treatment::whereDate('created_at',Carbon::today())
            ->where('doctor_id','=',$doctor->id)
            ->where('gc_level',null)->get();

        }else{
            $treatments=Treatment::whereDate('created_at',Carbon::today())
            ->where('gc_level',null)->get();
        }
        

    	 // dd($treatments);
    	 return view('Appointment.index',compact('treatments'));
    }
    public function patient(Request $request)
    {
        $patient_id=request('patient_id');
        $treatment_id=request('treatment_id');
    	$patient=Patient::find($patient_id);
        //dd($treatment_id);
        $drugs=Medicine::Where('medicinetype_id',1)->get();
        //dd($drugs);
        $injections=Medicine::where('medicinetype_id',2)->get();
        // dd($injections);
        $treatments=Treatment::where('patient_id',$patient_id)->where('gc_level','!=',null)->get();
       /* $treatmentdrugs= $treatments->medicines()
                         ->wherePivot('type', '!=', Null)
                         ->get();
        dd($treatmentdrugs);*/
       // dd($treatments);
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
        $appointments=Appointment::with('doctor')
                            ->where('status','!=',1)
                            ->get();
       
        $all=AppointmentResource::collection($appointments);
         return Datatables::of($all)->addIndexColumn()->make(true);


    }

    public function searchPRN(Request $request){
        $PRN= $request->PRN;
        $patient=Patient::where('PRN','=',$PRN)->first();
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
            'charges'=>0
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
     Appointment::create([
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
     $treatment->save();
     return redirect()->route('appointment.create');
    }

    public function appointmentCancel($id){
        $appointment=Appointment::find($id);
        $appointment->delete();
        return response()->json(['success'=>'Successfully deleted']);
    }
}

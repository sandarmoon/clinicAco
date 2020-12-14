<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\User;
use App\Treatment;
use App\Appointment;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\DoctorResource;
use DB;
use Auth;
use Carbon\Carbon;


class DoctorController extends Controller
{
     public function __construct()
    {
        $this->middleware(['role:Super_Admin|Admin','auth'])->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('doctor.index');
    }

    public function dashboard(){
        $id= Auth::user()->id;
       $doctor_id=Doctor::where('user_id',$id)->first();
       $d=$doctor_id->id;
        $survey=Doctor::with(['treatments'=>function($t){
            $t->whereNotNull('gc_level')->orderBy('created_at', 'DESC');
        },'appointments'=>function($a){
            $a->where('status',0)
            ->orderBy('TokenNo', 'ASC')
        ->orderBy('A_Date', 'ASC');
    },'referredFrom.patient'])

        // },'referredFrom.patient.treatments'=>function($e){
        //     $e->whereNotNull('gc_level');
        // }])
        ->withCount(['treatments'=>function($q1){
            $q1->whereNotNull('gc_level');
        },'appointments'=> function($q) {
            $q->where('status',0);
        },'referredBy','referredFrom'=>function($q2) {
           
           $q2->where('status','1');
        }])
        ->where('id',$doctor_id->id)
        ->get();
/*
        $treatments=Treatment::select('treatments.*')
             ->join('appointments','appointments.id','=','appointment_id')
            ->where('appointments.status',1) 
            ->whereDate('treatments.created_at',Carbon::today())
            ->where('treatments.doctor_id','=',$doctor->id)
            ->where('treatments.gc_level',null)
            ->orderBy('appointments.TokenNo')
            ->get();
            dd($treatments);*/

        $wpatients=Treatment::select('treatments.*')
             ->join('appointments','appointments.id','=','appointment_id')
            ->where('appointments.status',1) 
        ->whereNull('gc_level')
        ->where('treatments.doctor_id',$doctor_id->id)
        ->whereDate('treatments.created_at','>=',\Carbon::today()->toDateString())
        ->orderBy('appointments.TokenNo')
        ->get();

        // dd($wpatients);
        // $survey=Appointment::where('doctor_id',$doctor_id->id)
        // ->where('status',0)
        // ->get();
          //dd($survey);
          // dd($wpatients);

        return view('doctor.doctordashboard',compact('survey','wpatients'));
    }

    public function getDoctor(){
        $role=Auth::user()->roles[0];
       // dd( Auth::user()->owners(0);
        if($role->name=='Admin'){
            $all=Doctor::where('owner_id',Auth::user()->owners[0]->id)->get();
            // dd($all);
        
        }else if($role->name=="Reception"){
            
            $all=Doctor::where('owner_id',Auth::user()->receptions[0]->owner_id)->get();

        }else{
            $all=Doctor::all();
        }
        // dd($all);
        $all=  DoctorResource::collection($all);
        return Datatables::of($all)->addIndexColumn()->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ceti=array();
        $li=array();
        $profile='';
        
        //dd($request);
        request()->validate([
            'certificate.' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificate.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:users'
        ]);

        $certificate = $request->file('certificate');
        
        if($certificate){
            foreach ($certificate as $cer) {
                $name=uniqid().time().'.'.$cer->getClientOriginalExtension();
                $cer->move(public_path('storages/doctor/certificate'),$name);
                $path='storages/doctor/certificate/'.$name;
                $ceti[]=$path;
            }
        }
        //dd($dbfile);
        // INSERT INTO `doctors`(`id`, `user_id`, `nrc`, `age`, `dob`, `degree`, `certificate`, `license`, `experience`, `avatar`, `address`, `phone`, `created_at`, `updated_at`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])

        $licenses = $request->file('license');
        
        if($licenses){
            foreach ($licenses as $license) {
                $name=uniqid().time().'.'.$license->getClientOriginalExtension();
                $license->move(public_path('storages/doctor/license'),$name);
                $path='storages/doctor/license/'.$name;
                $li[]=$path;
            }
        }

        $avatar = $request->file('avatar');
       // dd($avatar);
        
        if($avatar){
           
                $name=uniqid().time().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(public_path('storages/doctor/profile'),$name);
                $profile='storages/doctor/profile/'.$name;
               
            
        }
        // dd(Auth::user()->owners[0]->id);

        $user=new User();
            $user->name=request('name');
            $user->email=request('email');
            $user->password=Hash::make(request('password'));
            $user->save();
      
            $user->assignRole('doctor');
        

        $doctor=Doctor::create([
            // 'owner_id'=>Auth::user()->id,
            'owner_id'=>Auth::user()->owners[0]->id,
            'user_id'=>$user->id,
            'nrc'=>request('nrc'),
            'age'=>request('age'),
            'dob'=>request('dob'),
            'degree'=>request('degree'),
            'certificate'=>json_encode($ceti),
            'license'=>json_encode($li),
            'experience'=>request('experience'),
            'avatar'=>$profile,
            'address'=>request('address'),
            'phone'=>request('phone'),
        ]);

        return response()->json(['success'=>'Record is successfully added!']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $doctor =Doctor::with('user')->find($id);
        // dd($doctor);
        return view('doctor.detail',compact('doctor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=Doctor::find($id);
       
        return view('doctor.edit',compact('doctor'));

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
        $ceti=array();
        $li=array();
        $dbC='';
        $dbL='';
        
        

        $certificate = $request->file('certificate');
        
        if($certificate){
            foreach ($certificate as $cer) {
                $name=uniqid().time().'.'.$cer->getClientOriginalExtension();
                $cer->move(public_path('storages/doctor/certificate'),$name);
                $path='storages/doctor/certificate/'.$name;
                $ceti[]=$path;
            }
            $dbC=json_encode($ceti);
        }else{
            $dbC=request('oldcertificate');
        }
        //dd($dbfile);
        // INSERT INTO `doctors`(`id`, `user_id`, `nrc`, `age`, `dob`, `degree`, `certificate`, `license`, `experience`, `avatar`, `address`, `phone`, `created_at`, `updated_at`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14])

        $licenses = $request->file('license');
        
        if($licenses){
            foreach ($licenses as $license) {
                $name=uniqid().time().'.'.$license->getClientOriginalExtension();
                $license->move(public_path('storages/doctor/license'),$name);
                $path='storages/doctor/license/'.$name;
                $li[]=$path;
            }
           $dbL= json_encode($li);
        }else{
            $dbL=request('oldlicense');
        }

        $avatar = $request->file('avatar');
       // dd($avatar);
        
        if($avatar){
           
                $name=uniqid().time().'.'.$avatar->getClientOriginalExtension();
                $avatar->move(public_path('storages/doctor/profile'),$name);
                $profile='storages/doctor/profile/'.$name;  
        }else{
            $profile=request('oldavatar');
        }
        //dd('you amdke it');

        
      

        
        $doctor=Doctor::with('user')->find($id);
            
            $doctor->nrc=request('nrc');
            $doctor->age=request('age');
            $doctor->dob=request('dob');
            $doctor->degree=request('degree');
            $doctor->certificate=$dbC;
            $doctor->license=$dbL;
            $doctor->experience=request('experience');
            $doctor->avatar=$profile;
            $doctor->address=request('address');
            $doctor->phone=request('phone');
            $doctor->update();

        // $u=DB::table('users')->join('doctors','doctors.user_id','=','users.id')
        //     ->select('users.*')
        //     ->first();
        //     $id=$u->id;
            // dd($id);


        $user=User::find($doctor->user->id);
            $user->name=request('name');
           
           
            $user->update();

        return response()->json(['success'=>'Record is successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        //dd($doctor->user->id);
        $doctor->delete();

        $user=User::find($doctor->user->id);
        $user->delete();
        $user->save();
        return response()->json(['success'=>'Record is successfully updated!']);
    }
}

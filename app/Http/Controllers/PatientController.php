<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Treatment;
use App\Referreddoctor;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $role=Auth::user()->roles[0];
                       // dd( Auth::user()->owners(0);
                        if($role->name=='Admin'){
                        
                            $id=Auth::user()->owners[0]->id;
                            // dd($id);
                            $patients=Patient::whereHas('reception.owner',function($q)use($id){
                                $q->where('id',$id);

                             })->orderBy('id','DESC')->get();
                        
                        }else if($role->name=="Reception"){
                            
                             $id=Auth::user()->receptions[0]->owner->id;
                            $patients=Patient::whereHas('reception.owner',function($q)use($id){
                                $q->where('id',$id);
                             })->orderBy('id','DESC')->get();

                        }else if($role->name=="Doctor"){
                           
                             $id=Auth::user()->doctors[0]->owner->id;
                             $patients=Patient::whereHas('reception.owner',function($q)use($id){
                                $q->where('id',$id)->orderBy('id','DESC');
                             })->orderBy('id','DESC')->get();
                        }else{
                            $patients=Patient::orderBy('id','DESC')->get();
                        }



        

        
         
       //  $patients=PatientResource::collection($patients);
       // return $this->sendResponse($patients, "Patient are successfully retrived");

        // $patients=Patient::All();
         return view('patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors=Doctor::where('owner_id',1)->get();
        
        return view('patients.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
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
            'phoneno'=>'required',
            'address'=>'required',
            
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
    $doctor_id=Doctor::first()->value('id');
    // dd($doctor_id);
    //dd($path);

     $patient=new Patient;
     $patient->PRN=$prn;
     $patient->name= request('name');
     $patient->fatherName=request('fathername');
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
     $patient->reception_id=Auth::user()->receptions[0]->id;
     $patient->save();

     // $treatment=new Treatment;
     // $treatment->patient_id=$patient->id;
     // if(request('dcotor')){
     //    $treatment->doctor_id=request('doctor');
     // }else{
     //    $treatment->doctor_id=$doctor_id;

     // }
     // $treatment->charges=0;
     // $treatment->save();
      return redirect()->route('patient.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid=Auth::user()->receptions[0]->owner_id;
         $patient = Patient::find($id);
          $doctors=Doctor::with('user')->
          where('owner_id',$uid)->get();
          $treatments=Treatment::where('patient_id',$id)
                        ->where('gc_level','!=',null)
                        ->orderBy('id','desc')
                        ->get();
                        // dd('helo');
         return view('patients.show',compact('patient','doctors','treatments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        
        // dd(json_decode($patient->file));
        return view('patients.edit',compact('patient'));
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
        

        if($request->hasfile('file'))
        {
            $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $file->move($upload_dir, $name);
               $paths[] = $upload_dir . $name;
               $path=json_encode($paths);
            }
        }else{
        $path=request('oldimg');
        //dd($path);
        }

       $patient = Patient::find($id);
        $patient->name= request('name');
         $patient->fatherName=request('fathername');
         $patient->age=request('age');
         $patient->child=request('child');
         $patient->gender=request('gender');
         $patient->phoneno=request('phoneno');
         $patient->address=request('address');
         $patient->married_status=request('married');
         $patient->pregnant=request('pregnant');
         $patient->body_weight=request('weight');
         $patient->allergy=request('allergy');
         $patient->job=request('job');
         $patient->file=$path;
         $patient->status=1;
         $patient->save();
         return redirect()->route('patient.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patient.index');
    }

    public function incharge(Request $request)
    {
    $doctor_id=Doctor::first()->value('id');
         $treatment=new Treatment;
     $treatment->patient_id=request('patient_id');
     if(request('dcotor')){
        $treatment->doctor_id=request('doctor');
     }else{
        $treatment->doctor_id=$doctor_id;

     }
     $treatment->save();
     Alert::success('status', 'incharge successfully!');
      return redirect('patient');
    }

    public function getTransferReport($pid){
       $data= Referreddoctor::with(['fromDoctor.user','toDoctor.user','patient'])
                ->where('patient_id',$pid)
                ->orderBy('created_at','desc')
                ->get();
       return response()->json([
            'data' => $data,
            
        ]);
    }
}

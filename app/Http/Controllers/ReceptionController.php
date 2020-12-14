<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reception;
use App\Doctor;
use App\Treatment;
use App\Appointment;
use App\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;
use Auth;
use Carbon\Carbon;


//use Spatie\Permission\Traits\HasRoles;
class ReceptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('reception.create');
    }

    public function dashboard(){
         $id= Auth::user()->id;
         $r=Reception::where('user_id',$id)->first();
         $owner_id=$r->owner_id;
      

        $survey=Doctor::with(['treatments'=>function($t){
            $t->whereNotNull('gc_level')->orderBy('created_at', 'DESC');
        },'appointments'=>function($a){
            $a->where('status',0)
            ->orderBy('TokenNo', 'ASC')

        ->orderBy('A_Date', 'ASC');


        },'user'])
        ->withCount(['treatments'=>function($q1){
            $q1->whereNotNull('gc_level');
        },'appointments'=> function($q) {
            $q->where('status',0)
                ->where('created_at','>=',Carbon::today());
        }])
        ->where('owner_id',$owner_id)
        ->get();




        $patientlists=Patient::with([
            'treatments'=>function($t){
            $t->whereNotNull('gc_level');},

        ])
        ->whereHas('reception',function($e)use($owner_id){
            $e->where('owner_id',$owner_id);
        })->
        get();

        $patients=Treatment::whereHas('patient.reception',function($e)use($owner_id){
                            $e->where('owner_id',$owner_id);
                        })
                        ->whereNotNull('gc_level')
                        ->orderBy('created_at','DESC') 
                      ->get()
                      ->unique('patient_id');
           // dd($patientlists);

        $wpatients=Treatment::with('patient','doctor','doctor.user')
        ->whereNull('gc_level')
        ->whereDate('created_at', Carbon::today())->get();
        $survey1=Appointment::with('doctor','doctor.user')
        ->where('status',0)
        ->where('A_Date','>=',Carbon::today()->toDateString())
        ->limit('10')
        ->get();
        // dd($survey);
          // dd($wpatients);

        return view('reception.rdashboard',compact('survey','survey1','wpatients','patients','patientlists'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
         request()->validate([
            'name'=>'required',
            'txtEmpPhone' => 'required|min:3',
            'address' => 'required|min:10',
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:8',
            'education'=>'required',
            'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

           if ($request->hasfile('file')) {

            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/storages/files',$name);
            $path = '/storages/files/'.$name;
        }
        //dd($path);
        $user=new User;
        $user->name=request('name');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
      
        $user->save();
          $user->assignrole('reception');

        $reception=new Reception;
        $reception->gender=request('gender');
        $reception->phoneno=request('txtEmpPhone');
        $reception->education=request('education');
        $reception->address=request('address');
        $reception->user_id=$user->id;
        $reception->owner_id=Auth::user()->owners[0]->id;
        $reception->file=$path;
        $reception->save();

         return response()->json(['success'=>'Record is successfully']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reception=Reception::find($id);
        return view('reception.detail',compact('reception'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reception=DB::table('receptions')
                    ->join('users','users.id','=','receptions.user_id')
                    ->where('receptions.id','=',$id)
                    ->select('users.*','receptions.*')
                    ->get();

                    //dd($reception);
        return $reception;
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
       // dd($request);
         request()->validate([
            'name'=>'required',
            'txtEmpPhone' => 'required|min:3',
            'address' => 'required|min:10',
            'email' => 'required',
            'education'=>'required',
            //'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         if ($request->hasfile('file')) {

            $image = $request->file('file');
            $name = $image->getClientOriginalName();
            $image -> move(public_path().'/storages/files',$name);
            $path = '/storages/files/'.$name;
        }else{
            $path=request('oldimg');
        }

        // if(request('newpassword')){
        //     $password=Hash::make(request('newpassword'));
        // }else{
        //     $password=request('password');
        // }

        $userid =(int)request('userid');
        //var_dump($userid);
         $user=User::find($userid);
         //dd($user);
        $user->name=request('name');
        $user->email=request('email');
        
        //$user->assignrole('reception');
        $user->save();

        $reception=Reception::find($id);
        $reception->gender=request('gender');
        $reception->phoneno=request('txtEmpPhone');
        $reception->education=request('education');
        $reception->address=request('address');
        $reception->user_id=$user->id;
        $reception->file=$path;
        $reception->save();

         return response()->json(['success'=>'update successfully']);


        }
        // dd(request('name'));
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $reception=Reception::find($id);
         
        $user=User::find($reception->user_id);
        //dd($user);
        $user->delete();
        $reception->delete();
        return response()->json(['success'=>'Record is successfully updated!']);
    }

    public function getuser(){

        //$delete=null;
        /*$receptions=DB::table('receptions')
                    ->join('users','users.id','=','receptions.user_id')
                    ->select('users.*','receptions.*')
                    ->get();
*/
            //dd($receptions);

       // $reception = Reception::all();
                     $role=Auth::user()->roles[0];
                       // dd( Auth::user()->owners(0);
                        if($role->name=='Admin'){
                            $all=Reception::where('owner_id',Auth::user()->owners[0]->id)->get();
                            // dd($all);
                        
                        }else if($role->name=="Reception"){
                            
                            $all=Reception::where('owner_id',Auth::user()->receptions[0]->owner_id)->get();

                        }else{
                            $all=Reception::all();
                        }
                        // dd($all);
                        // $all=  DoctorResource::collection($all);
                        // return Datatables::of($all)->addIndexColumn()->make(true);

       $receptions=UserResource::collection($all);

        return $receptions;
    }
}

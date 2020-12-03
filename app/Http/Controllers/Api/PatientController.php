<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Patient;
use App\Doctor;
use App\Appointment;
use Auth;
use Validator;
use App\Http\Resources\Api\PatientResource;
use App\Http\Resources\Api\DoctorResource;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reception=Auth::user()->receptions[0]->id;
         
        $patients=PatientResource::collection(Patient::where('reception_id',1)->get());
       return $this->sendResponse($patients, "Patient are successfully retrived");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request('fathername'));
        $input=$request->all();
        $validator=Validator::make($input,[
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
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        //validation is success
        //creating PRN
        $characters = '0123456789';
        $string = '';
         $max = strlen($characters) - 1;

         for ($i = 0; $i < 5; $i++){
              $string .= $characters[mt_rand(0, $max)];
         }
         $prn=$string;
         $path=[];


         if($request->hasfile('file'))
        {

            // $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $filepath=$file->storeAs('files', $name, 'public');
                // $file->move($upload_dir, $name);
               //$path[] = $upload_dir . $name;
                $path[]='storage/'.$filepath;
            }
            
        }
         $patient=new Patient;
         $patient->PRN=$prn;
         $patient->name= request('name');
         $patient->fatherName=request('fathername');
         $patient->age=request('age');
         $patient->child=request('child');
         $patient->gender=request('gender');
         $patient->phoneno=request('phoneno');
         $patient->address=request('address');

          if(request('married') =='false'){
               $patient->married_status=0;
            }else{
                $patient->married_status=1;
            }

         $patient->status=0;

         if(request('pregnant')=='false'){
            $patient->pregnant=0;
         }else{
            $patient->pregnant=1;
         }
         
        
         $patient->body_weight=request('weight');
         $patient->allergy=request('allergy');
         $patient->job=request('job');
         $patient->file=json_encode($path);
         $patient->reception_id=Auth::user()->receptions[0]->id;
         $patient->save();

          return $this->sendResponse(new PatientResource($patient), 'New Patient created successfully.');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $patient = new PatientResource(Patient::find($id));
         return $this->sendResponse($patient, "Patient is successfully retrived");
          
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
        $input=$request->all();
        $validator=Validator::make($input,[
            // 'name'=>'required',
            // 'fathername'=>'required',
            // 'age'=>'required|numeric',
            // 'child'=>'required',
            // 'gender'=>'required',
            // 'phoneno'=>'required|numeric',
            // 'address'=>'required',
            // 'married'=>'required',
            // 'pregnant'=>'required',
            // 'weight'=>'required',
            // 'allergy'=>'required',
            // 'job'=>'required',
            'oldimg'=>'required',
            'file.*' => 'mimes:jpg,jpeg,png,bmp|max:20000'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

         if($request->hasfile('file'))
        {
            $upload_dir = 'storages/files/';

            $files = $request->file('file');
            foreach($files as $file)
             {
            //     $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
            //     $file->move($upload_dir, $name);
            //    $paths[] = $upload_dir . $name;
            //    $path=json_encode($paths);

                 $name = time().uniqid(rand()).'.'.$file->getClientOriginalExtension();
                $filepath=$file->storeAs('files', $name, 'public');
                // $file->move($upload_dir, $name);
               //$path[] = $upload_dir . $name;
                $paths[]='storage/'.$filepath;
                  $path=json_encode($paths);
            }


            $oldimgs=json_decode(request('oldimg'));
            // dd($oldimgs);
            if(!empty($oldimgs)){
                foreach ($oldimgs as $key => $value) {
               Storage::delete($value);
            }
            }
            

        }else{

        $path=request('oldimg');
        //dd($path);
        }

       $patient = Patient::find($id);
        $patient->name= request('name');
         $patient->fathername=request('fathername');
         $patient->age=request('age');
         $patient->child=request('child');
         $patient->gender=request('gender');
         $patient->phoneno=request('phoneno');
         $patient->address=request('address');
         if(request('married') =='false'){
               $patient->married_status=0;
            }else{
                $patient->married_status=1;
            }

         $patient->status=0;

         if(request('pregnant')=='false'){
            $patient->pregnant=0;
         }else{
            $patient->pregnant=1;
         }
         $patient->body_weight=request('weight');
         $patient->allergy=request('allergy');
         $patient->job=request('job');
         $patient->file=$path;
         $patient->status=0;
         $patient->save();
        return $this->sendResponse(new PatientResource($patient), ' Patient updated successfully.');
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

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\TreatmentReource;
use Carbon;
use Auth;
use App\Referreddoctor;
use App\Treatment;
class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        
       $files=[];
        $arr=json_decode($this->file);
        // dd(count($data));
        if(!empty($arr)){
            foreach ($arr as $key => $value) {
               array_push($files, url($value));
            }
        }

        $data= [
            "id"=> $this->id,
            "PRN"=> $this->PRN,
            "receptionName"=>$this->reception->user->name ,
            "name"=> $this->name,
            "fatherName"=> $this->fatherName,
            "age"=> $this->age,
            "child"=> $this->child,
            "gender"=> $this->gender,
            "phoneno"=> $this->phoneno,
            "address"=> $this->address,
            "body_weight"=> $this->body_weight,
            "allergy"=> $this->allergy,
            "job"=> $this->job,
            "file"=> $files,
            "deleted_at"=> $this->deleted_at,
            "created_at"=> $this->created_at->toDateTimeString(),
            "updated_at"=> $this->created_at->toDateTimeString()
            ];

        if($this->married_status ==0){
            $data['married_status']=false;
        }else{
            $data['married_status']=true;
        }

        if($this->pregnant ==0){
            $data['pregnant']=false;
        }else{
            $data['pregnant']=true;
        }

        if(Auth::user()->hasRole('Doctor')){
                
                 $did=Auth::user()->doctors[0]->id;;
                 $pid=$this->id;
            
                $lastassginP=Referreddoctor::
                                where('patient_id',$pid)
                                ->orderBy('created_at','DESC')->first();

                                
                $assignedDoc=Referreddoctor::where('to_doctor_id',$did)
                                ->where('patient_id',$pid)
                                ->orderBy('created_at','DESC')->first();
                                // dd($assignedDoc);

                if($assignedDoc!=null){// you have been assigned  with patient but no idea the last or not

                     if($lastassginP->to_doctor_id == $assignedDoc->to_doctor_id){
                        // yes you are lalst assigned
                        $treatments = Treatment::where('patient_id',$pid)->
                             whereNotNull('gc_level')->
                              orderBy('created_at','DESC')->get()->unique('doctor_id');

                     }else{
                        //no you are not!
                        if($assignedDoc->status==0){

                                $dolastassgin=Referreddoctor::where('from_doctor_id',$assignedDoc->to_doctor_id)
                                ->where('patient_id',$assignedDoc->patient_id)
                                ->orderBy('created_at','DESC')
                                ->first();
                                 // dd($dolastassgin);
                                 $status=$assignedDoc->status;
                                   $removeDate=$dolastassgin->created_at;
                                    // dd($assignedDoc);
                                   $treatments=Treatment::whereDate('created_at','<=',$removeDate)
                                                ->where('patient_id',$pid)
                                                ->orderBy('created_at','DESC')
                                                ->get()->unique('doctor_id');
                               
                           }   
                     }




                }else{
                    //you are the first one
                    $treatments=Treatment::where('patient_id','=',$pid)
                        ->whereNotNull('gc_level')
                        ->where('doctor_id','=',$did)
                        ->get();
                }

                






                 $data['history']=TreatmentHistoryResource::collection($treatments);
        }else{
            $data['history']=TreatmentHistoryResource::collection($this->treatments);
        }


        return $data;
    }
}

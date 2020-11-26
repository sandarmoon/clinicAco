<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\TreatmentReource;
use Carbon;
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
         $data['history']=TreatmentHistoryResource::collection($this->treatments);



        return $data;
    }
}

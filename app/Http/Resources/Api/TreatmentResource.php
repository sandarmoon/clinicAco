<?php

namespace App\Http\Resources\Api;
use App\Http\Resources\Api\PatientResource;

use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $medicines=[];
        foreach ($this->medicines as $k=> $value) {
            $obj = (object)[];
            $obj->name=$value->name;
            $obj->medicineType=$value->medicinetype->name;
            $obj->chemical=$value->chemical;
            $obj->size=$value->size;
            $obj->tab=$value->pivot->tab;
            $obj->interval=$value->pivot->interval;
            $obj->meal=$value->pivot->meal;
            $obj->during=$value->pivot->during;
            $obj->type=$value->pivot->type;
           array_push($medicines, $obj);
        // $medicines[$k]={'medicine'=>$value->name,
        //                 'tab'=>$value->pivot->tab};
       
           
             // $value->pivot->tab;
        }
        return  [
            "id"=> $this->id,
            "file"=> $this->file,
            "gc_level"=> $this->gc_level,
            "temperature"=> $this->temperature,
            "body_weight"=> $this->body_weight,
            "spo2"=> $this->spo2,
            "pr"=> $this->pr,
            "bp"=> $this->bp,
            "rbs"=> $this->rbs,
            "complaint"=> $this->complaint,
            "examination"=> $this->examination,
            "relevant_info"=> $this->relevant_info,
            "chronic_disease"=> $this->chronic_disease,
            "diagnosis"=> $this->diagnosis,
            "external_medicine"=> $this->external_medicine,
            "next_visit_date"=> $this->next_visit_date,
            "next_visit_date2"=> $this->next_visit_date2,
            "doctor"=>$this->doctor->user->name,
            "clinicName"=>$this->doctor->owner->clinic_name,
            "charges"=> $this->charges,
            "deleted_at"=> null,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
            "medicine_history"=>$medicines
            ];

        
    }
}

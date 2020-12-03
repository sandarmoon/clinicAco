<?php

namespace App\Http\Resources\Api;
use App\Http\Resources\MedicinetypeResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Referreddoctor;
class TreatmentHistoryResource extends JsonResource
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

        $medicines=[];
        foreach ($this->medicines as $k=> $value) {
            $obj = (object)[];
            $obj->name=$value->name;
            $obj->medicineType=new MedicinetypeResource($value->medicinetype);
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
        // dd($medicines);
    
       $files=[];
        $arr=json_decode($this->file);
        // dd(count($data));
        if(!empty($arr)){
            foreach ($arr as $key => $value) {
               array_push($files, url($value));
            }
        }


        $data=[

            "id"=>$this->id,
            "file"=>$files,
            "gc_level"=>$this->gc_level,
            "temperature"=>$this->temperature,
            "body_weight"=>$this->body_weight,
            "spo2"=>$this->spo2,
            "pr"=>$this->pr,
            "bp"=>$this->bp,
            "rbs"=>$this->rbs,
            "complaint"=>$this->complaint,
            "examination"=>$this->examination,
            "relevant_info"=>$this->relevant_info,
            "chronic_disease"=>$this->chronic_disease,
            "diagnosis"=>$this->diagnosis,
            "external_medicine"=>$this->external_medicine,
            "next_visit_date"=>$this->next_visit_date,
            "next_visit_date2"=>$this->next_visit_date2,
            "doctor"=>$this->doctor->user->name,
            "clinicName"=>$this->doctor->owner->clinic_name,
            // "doctor"=>$this->doctor->user->name,
            "visitedDate"=>$this->created_at->toDateTimeString(),
            // "charges"=>$this->charges,
            "created_at"=> $this->created_at->toDateTimeString(),
            "updated_at"=> $this->created_at->toDateTimeString(),
            "medicine_history"=>$medicines
                        

        ];
        return $data;

    }
}

<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\MedicinetypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
        return [

            "id"=> $this->id,
            "medicinetype"=>new MedicinetypeResource($this->medicinetype),
            "name"=> $this->name,
            "chemical"=>$this->chemical ,
            "created_at"=>$this->created_at->toDateTimeString(),
            "updated_at"=> $this->updated_at->toDateTimeString(),
            "clinicName"=> $this->owner->clinic_name,
            "size"=> $this->size

        ];
    }
}

<?php

namespace App\Http\Resources\Api;

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
            "medicinetype"=> $this->medicinetype->name,
            "name"=> $this->name,
            "chemical"=>$this->chemical ,
            "created_at"=>$this->created_at,
            "updated_at"=> $this->updated_at,
            "clinicName"=> $this->owner->clinic_name,
            "size"=> $this->size

        ];
    }
}

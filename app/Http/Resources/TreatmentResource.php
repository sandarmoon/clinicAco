<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DoctorResource;

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
        // return parent::toArray($request);
        return [
            'treatment'=>parent::toArray($request),
            'patient'=>$this->patient,
            
            'doctor'=>$this->doctor,
            'doctorinfo'=>$this->doctor->user,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->user->name,
            'email'=>$this->user->email,
            'profile'=>url($this->avatar),
            'nrc'=>$this->nrc,
            'age'=>$this->age,
            'dob'=>$this->dob,
            'clinicName'=>$this->clinic_name,
            'clinicLogo'=>url($this->clinic_logo),
            'clinicAddress'=>$this->address,
            'phone'=>$this->phone,
            
        ];
    }
}

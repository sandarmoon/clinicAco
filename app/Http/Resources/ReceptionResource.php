<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OwnerResource;

class ReceptionResource extends JsonResource
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
            'profile'=>url($this->file),
            'gender'=>$this->gender,
            'phone'=>$this->phoneno,
            'education'=>$this->education,
            'address'=>$this->address,
            'clinicinfo'=>new OwnerResource($this->owner),
            
            
        ];
    }
}

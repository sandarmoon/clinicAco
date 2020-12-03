<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
        $arr=json_decode($this->certificate);
        // dd(count($data));
        if(!empty($arr)){
            foreach ($arr as $key => $value) {
               array_push($files, url($value));
            }
        }

         $licenses=[];
        $arr=json_decode($this->license);
        // dd(count($data));
        if(!empty($arr)){
            foreach ($arr as $key => $value) {
               array_push($licenses, url($value));
            }
        }
        return [
            "id"=> 1,
            "clinciName"=> $this->owner->clinc_name,
            "name"=> $this->user->name,
            "nrc"=> $this->nrc,
            "age"=> $this->age,
            "dob"=> $this->dob,
            "degree"=> $this->degree,
            "certificate"=> $files,
            "license"=> $licenses,
            "experience"=> $this->experience,
            "avatar"=> url($this->avatar),
            "address"=> $this->address,
            "phone"=> $this->phone,
            "created_at"=> $this->created_at->toDateTimeString(),
            "updated_at"=> $this->updated_at->toDateTimeString(),
        ];
    }
}

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
        return [
            "id"=> 1,
            "clinciName"=> $this->owner->clinc_name,
            "name"=> $this->user->name,
            "nrc"=> $this->nrc,
            "age"=> "32",
            "dob"=> "1988-06-24",
            "degree"=> "M.B.,B.S,M.Med.Sc(Int.Med)(GrandMaster Level)",
            "certificate"=> "[\"storages\\/doctor\\/certificate\\/5f57885bdbd011599572059.jpg\"]",
            "license"=> "[\"storages\\/doctor\\/license\\/5f57885bdc04c1599572059.jpg\"]",
            "experience"=> "...",
            "avatar"=> "storages/doctor/profile/5f57885bdc1851599572059.jpg",
            "address"=> "yangon",
            "phone"=> "09-87665432",
            "deleted_at"=> null,
            "created_at"=> "2020-09-08 13:34:20",
            "updated_at"=> "2020-09-08 13:34:20"
        ];
    }
}

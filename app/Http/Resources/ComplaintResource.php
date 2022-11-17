<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComplaintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'anonymous' => $this->anonymous,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'complainanttype' => $this->complainanttype,
            'allegetype' => $this->allegetype,
            'reported' => $this->reported,
            'towhom' => $this->towhom,
            'description' => $this->description,
            'detail' => $this->detail,
            'threat' => $this->threat,
            'evidence' => $this->evidence,
            'dateoccurred' => $this->dateocurred,
            'wid' => $this->wid,
            'nid' => $this->nid,
            'nopossession' => $this->nopossession,
            'user_id' => $this->user_id,
            'complaintno' => $this->complaintno,
            "files" => DocResource::collection($this->docs)
        ];
    }
}

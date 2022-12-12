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
            'contactyou' => $this->contactyou,
            'email' => $this->email,
            'phoneno' => $this->phoneno,
            'complainanttype' => $this->complainanttype,
            'allegetype' => $this->allegetype,
            'specify' => $this->specify,
            'reported' => $this->reported,
            'towhom' => $this->towhom,
            'description' => $this->description,
            'detail' => $this->detail,
            'threat' => $this->threat,
            'elaborate' => $this->elaborate,
            'evidence' => $this->evidence,
            'evidencedescribe' => $this->evidencedescribe,
            'dateoccurred' => $this->dateoccurred,
            'wid' => $this->wid,
            'nid' => $this->nid,
            'nopossession' => $this->nopossession,
            'user_id' => $this->user_id,
            'complaintno' => $this->complaintno,
            'status' => $this->status,
            'controlno' => $this->controlno,

            'conclusion' => $this->conclusion,

            'reportdate' => $this->created_at,
            "files" => DocResource::collection($this->docs)
        ];
    }
}

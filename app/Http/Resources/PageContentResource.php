<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Mail\Markdown;


class PageContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)

    {
        $result = $this->content;
        error_log($result);
        return [
        'id'          => $this->id,
        'name'        => $this->name,
        'title'       =>$this->title,
        'content'     => $this->content,
        'imagepath'    => $this->imagepath,
        'position'     => $this->postiion, 
        'resource_path'=> $this->resource_path
    ];
        return parent::toArray($request);
    }
}

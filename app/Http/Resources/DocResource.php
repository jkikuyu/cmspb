<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $extpos = strlen($this->orig_name) - strpos($this->orig_name, ".");
        return [
            'name' => $this->orig_name,
            'filename' => $this->filename,
            'id' => $this->id,
            'path' => "storage/uploads/",
            'ext' => substr($this->orig_name, strpos($this->orig_name, ".") - strlen($this->orig_name))

        ];
    }
}

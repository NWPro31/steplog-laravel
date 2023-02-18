<?php

namespace App\Http\Resources\DomainReg;

use Illuminate\Http\Resources\Json\JsonResource;

class DomainRegResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title
        ];
    }
}

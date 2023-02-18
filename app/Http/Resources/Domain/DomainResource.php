<?php

namespace App\Http\Resources\Domain;

use App\Http\Resources\DomainReg\DomainRegResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'price_extension' => $this->price_extension,
            'period' => $this->period,
            'is_stored' => $this->is_stored,
            'reg_id' => $this->reg_id,
            'registrator' => new DomainRegResource($this->domainReg)
        ];
    }
}

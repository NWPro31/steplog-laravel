<?php

namespace App\Http\Resources\Domain\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDomainResource extends JsonResource
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
            'contact_ru_id' => $this->contact_ru_id,
            'domain_id' => $this->domain_id,
            'ns' => json_decode($this->ns),
            'price' => $this->price,
            'url' => $this->url
        ];
    }
}

<?php

namespace App\Http\Resources\Domain\ChangeNs;

use Illuminate\Http\Resources\Json\JsonResource;

class ChangeNsDomainResource extends JsonResource
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
            'order_domain_id' => $this->order_domain_id,
            'order_domain' => $this->orderDomain,
            'status_id' => $this->status_id,
            'status' => $this->status,
            'ns' => json_decode($this->ns)
        ];
    }
}

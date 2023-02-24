<?php

namespace App\Http\Resources\OrderService;

use App\Http\Resources\Service\ServiceResource;
use App\Http\Resources\StatusOrderService\StatusOrderServiceResource;
use App\Models\StatusOrderService;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderServiceResource extends JsonResource
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
            'description' => $this->description,
            'price' => $this->price,
            'service_id' => $this->service_id,
            'url' => $this->url,
            'service' => new ServiceResource($this->service),
            'status' => new StatusOrderServiceResource($this->status)
        ];
    }
}

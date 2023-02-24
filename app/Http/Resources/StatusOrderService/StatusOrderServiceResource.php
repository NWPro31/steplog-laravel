<?php

namespace App\Http\Resources\StatusOrderService;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusOrderServiceResource extends JsonResource
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
            'title' => $this->title,
            'created_at' => $this->created_at
        ];
    }
}

<?php

namespace App\Http\Resources\Service\Order\Status;

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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'user_name' => $this->user->name,
            'user_role' => $this->user->role
        ];
    }
}

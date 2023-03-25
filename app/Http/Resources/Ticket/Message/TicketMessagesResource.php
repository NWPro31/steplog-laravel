<?php

namespace App\Http\Resources\Ticket\Message;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketMessagesResource extends JsonResource
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
            'message' => $this->message,
            'updated_at' => $this->updated_at,
            'user_name' => $this->user->name,
            'user_role' => $this->user->role,
            'image_url' => $this->user->image_url
        ];
    }
}

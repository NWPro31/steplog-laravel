<?php

namespace App\Http\Resources\Service\Order\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentOrderServiceResource extends JsonResource
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
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'user_name' => $this->user->name,
            'user_role' => $this->user->role
        ];
    }
}

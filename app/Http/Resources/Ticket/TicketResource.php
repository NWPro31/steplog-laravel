<?php

namespace App\Http\Resources\Ticket;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->service_order_id!==null) $order = $this->orderHosting;
        elseif($this->domain_order_id!==null) $order = $this->orderHosting;
        elseif($this->hosting_order_id!==null) $order = $this->orderHosting;
        else $order = null;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'service_order_id' => $this->service_order_id,
            'domain_order_id' => $this->domain_order_id,
            'hosting_order_id' => $this->hosting_order_id,
            'order' => $order,
            'last_message' => $this->lastMessage
        ];
    }
}

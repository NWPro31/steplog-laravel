<?php

namespace App\Http\Resources\Ticket;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'created_at' => $this->created_at,
            'amount' => $this->amount,
            'is_paid' => $this->is_paid,
            'service_order_id' => $this->service_order_id,
            'domain_order_id' => $this->domain_order_id,
            'hosting_order_id' => $this->hosting_order_id,
            'partial' => $this->partial,
            'user_id' => $this->user_id,
            'status' => $this->status
        ];
    }
}

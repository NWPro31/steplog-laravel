<?php

namespace App\Http\Resources\Hosting\Order;

use App\Models\Hosting;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderHostingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tarifs = Hosting::all();
        return [
            'id' => $this->id,
            'hosting_id' => $this->hosting_id,
            'price' => $this->price,
            'name' => $this->name,
            'url' => $this->url,
            'status' => $this->status,
            'status_id' => $this->status_id,
            'hosting' => $this->hosting,
            'tarifs' => $tarifs
        ];
    }
}

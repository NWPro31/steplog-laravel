<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderHosting ()
    {
        return $this->belongsTo(OrderHosting::class, 'hosting_order_id', 'id');
    }

    public function orderService ()
    {
        return $this->belongsTo(OrderService::class, 'serivce_order_id', 'id');
    }

    public function orderDomain ()
    {
        return $this->belongsTo(OrderDomain::class, 'domain_order_id', 'id');
    }

    public function lastMessage ()
    {
        return $this->hasOne(MessageTicket::class)->orderBy('id', 'DESC');
    }
}

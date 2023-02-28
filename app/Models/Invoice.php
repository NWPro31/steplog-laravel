<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderServices ()
    {
        return $this->belongsTo(OrderService::class, 'service_order_id', 'id');
    }

    public function status ()
    {
        return $this->belongsTo(StatusInvoice::class, 'status_id', 'id');
    }
}

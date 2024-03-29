<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderService extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function status()
    {
        return $this->hasOne(StatusOrderService::class, 'order_id', 'id')->orderBy('id', 'DESC');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'service_order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

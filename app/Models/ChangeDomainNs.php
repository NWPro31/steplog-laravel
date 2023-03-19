<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeDomainNs extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status ()
    {
        return $this->belongsTo(StatusChangeDomainNs::class);
    }

    public function orderDomain ()
    {
        return $this->belongsTo(OrderDomain::class);
    }


}

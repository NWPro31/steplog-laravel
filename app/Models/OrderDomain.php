<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDomain extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status ()
    {
        return $this->belongsTo(StatusOrderDomain::class);
    }

    public function changeNs ()
    {
        return $this->hasOne(ChangeDomainNs::class)->orderBy('id', 'DESC');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHosting extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function status ()
    {
        return $this->belongsTo(StatusOrderHosting::class);
    }

    public function hosting ()
    {
        return $this->belongsTo(Hosting::class);
    }
}

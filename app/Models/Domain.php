<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function domainReg()
    {
        return $this->belongsTo(DomainReg::class, 'reg_id', 'id');
    }

}

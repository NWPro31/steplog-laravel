<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainReg extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function domains()
    {
        return $this->hasMany(Domain::class, 'reg_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class priority extends Model
{
    use HasFactory;


    public function tickets()
    {
        return $this->hasOne(tickets::class,'priority_id');
    }
}

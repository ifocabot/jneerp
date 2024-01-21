<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketStatus extends Model
{
    use HasFactory;


    public function tickets()
    {
        return $this->hasOne(tickets::class,'ticket_status_id');
    }
}

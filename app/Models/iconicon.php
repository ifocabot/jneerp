<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iconicon extends Model
{
    use HasFactory;

    protected $table = "iconicon";

    public function tickethistory()
    {
        return $this->belongsTo(tickets::class, 'icon_id');
    }

}

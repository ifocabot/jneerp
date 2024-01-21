<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickethistory extends Model
{
    use HasFactory;

    protected $table = 'ticket_history';

    protected $fillable = ['history','ticket_id','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function icon()
    {
        return $this->belongsTo(iconicon::class,'icon_id');
    }
}

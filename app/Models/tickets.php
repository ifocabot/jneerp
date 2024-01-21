<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = ['tix_code','owner_id','target_id','guest_id','is_it_guest','cc','subject','ticket_status_id','help_topic_id','department_id','type_id','assigned_id','priority_id','description','due_date','is_it_accepted','accepted_at','created_at','updated_at'];

    protected $casts = [
        'created_at' => 'datetime',
    ];


    public function priority()
    {
        return $this->belongsTo(priority::class,'priority_id');
    }

    public function status()
    {
        return $this->belongsTo(ticketStatus::class,'ticket_status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function targetid()
    {
        return $this->belongsTo(User::class,'target_id');
    }

    public function helpTopic()
    {
        return $this->belongsTo(helpTopics::class,'help_topic_id');
    }

}

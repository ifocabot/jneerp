<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class helpTopics extends Model
{
    use HasFactory;

    protected $table = 'help_topics';

    public function helpTopic()
    {
        return $this->belongsTo(tickets::class, 'help_topic_id');
    }
}

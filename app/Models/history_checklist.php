<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_checklist extends Model
{
    use HasFactory;

    protected $table = 'history_checklist_drivers';

    protected $fillable = ['users_id', 'vehicles_id', 'kondisi_body', 'kondisi_lampu_depan', 'kondisi_lampu_belakang', 'kondisi_ban', 'kondisi_ban_serep','kondisi_kaca','keterangan','created_at','updated_at'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipekendaraanModels extends Model
{
    use HasFactory;

    protected $table = 'type_vehicles';


    public function kendaraan()
    {
        return $this->hasOne(kendaraanModels::class,'vehicles_id');
    }

}

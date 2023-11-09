<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasolineModels extends Model
{
    use HasFactory;

    protected $table = 'gasoline';

    public function kendaraan()
    {
        return $this->hasOne(kendaraanModels::class,'vehicles_id');
    }

    public function gasolinehistory()
    {
        return $this->hasOne(gasolineHistoryModels::class,'gasoline_id');
    }

}

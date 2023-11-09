<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaModels extends Model
{
    use HasFactory;

        protected $table = 'areas';

        protected $fillable = ['nama_area','div_area','created_at','updated_at'];


    public function oddoOut()
    {
        return $this->hasOne(oddoOutModels::class,'oddoout_id');
    }
    public function oddoOut_area_awal()
    {
        return $this->hasOne(oddoOutModels::class,'area_awal_id');
    }

    public function oddoIn()
    {
        return $this->hasOne(oddoInModels::class,'oddoin_id');
    }
}

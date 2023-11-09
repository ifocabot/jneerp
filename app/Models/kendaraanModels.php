<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kendaraanModels extends Model
{
    use HasFactory;

    protected $table = 'vehicles';


    protected $fillable = [
        'nomor_plat',
        'tahun',
        'model_kendaraan',
        'vendor_kendaraan',
        'brand_kendaraan',
        'expire_tax',
        'expire_plat',
        'expire_kir',
        'last_oddo',
        'gasoline_id',
        'type_vehicles_id',
        'is_active',
        'is_available',
        'is_service',
        'is_pickup'
    ];


    public function riwayatOddo()
    {
        return $this->hasOne(OddoHistoryModels::class,'vehicles_id');
    }

    public function riwayatBensin()
    {
        return $this->hasOne(gasolineHistoryModels::class,'vehicles_id');
    }

    public function gasoline(){

        return $this->belongsTo(gasolineModels::class,'gasoline_id');
    }

    public function type_vehicles(){

        return $this->belongsTo(tipekendaraanModels::class,'type_vehicles_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oddoInModels extends Model
{
    use HasFactory;

    protected $table = 'oddoin';

    protected $id = 'id';

    protected $fillable = ['oddo_meter_in', 'foto_oddo_in', 'areas_id','keterangan'];

    public function riwayatOddo()
    {
        return $this->hasOne(OddoHistoryModels::class,'oddoin_id');
    }

    public function areas()
    {
        return $this->belongsTo(areaModels::class,'areas_id');
    }
}

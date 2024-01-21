<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gasolineHistoryModels extends Model
{
    use HasFactory;

    protected $table = 'gasoline_history';

    protected $fillable = ['users_id', 'vehicles_id', 'gasoline_id', 'total_pembelian', 'total_liter', 'foto_struk', 'oddo_terakhir','created_at','lokasi_pengisian','ratio','tanggal','total_penggunaan'];


    public function vehicles(){

        return $this->belongsTo(kendaraanModels::class,'vehicles_id');
    }

    public function users(){

        return $this->belongsto(User::class,'users_id');
    }

    public function gasoline(){

        return $this->belongsto(gasolineModels::class,'gasoline_id');
    }


}

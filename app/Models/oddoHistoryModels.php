<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OddoHistoryModels extends Model
{
    use HasFactory;

     protected $table = 'oddo_history';

     protected $fillabe = ['users_id','oddoout_id','oddoin_id','vehicles_id'];


    public function oddoIn()
    {
        return $this->belongsTo(oddoInModels::class,'oddoin_id');
    }

    public function oddoOut()
    {
        return $this->belongsTo(oddoOutModels::class,'oddoout_id');
    }

    public function users(){

        return $this->belongsTo(User::class,'users_id');
    }

    public function vehicles(){

        return $this->belongsTo(kendaraanModels::class,'vehicles_id');
    }

}

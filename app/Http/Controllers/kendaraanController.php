<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gasolineModels;
use App\Models\tipekendaraanModels;
use App\Models\kendaraanModels;

class kendaraanController extends Controller
{


    public function halamanTambah(){

        return view ('erp.erpTambahDataMobil');

    }
}

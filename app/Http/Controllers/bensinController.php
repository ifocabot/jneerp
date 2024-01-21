<?php

namespace App\Http\Controllers;

use App\Models\areaModels;
use App\Models\gasolineModels;
use App\Models\kendaraanModels;
use App\Models\User;
use App\Models\gasolineHistoryModels;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class bensinController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $kendaraan = kendaraanModels::all();
        $tipebensin = gasolineModels::all();
        $users = User::all()->sortBy('name');

        return view('user.userInputBensin',compact(
            'kendaraan',
            'tipebensin',
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users_id' =>'required',
            'vehicles_id' => 'required',
            'gasoline_id' => 'required',
            'oddo_terakhir' => 'required',
            'total_pembelian' => 'required',
            'lokasi_pengisian' => 'required',
            'tanggal' => 'required'
        ]);

        // Process and save the uploaded image
        $image = $request->file('image');
        $img = Image::make($image)->resize(800, 600)->encode('jpg', 80);
        $fileName = uniqid() . '.jpg';
        $filePath = 'uploads/bensin/' . $fileName;
        Storage::disk('public')->put($filePath, $img->stream());

        // Find the most recent record, if any
        $data_terakhir = GasolineHistoryModels::where('vehicles_id', $validatedData['vehicles_id'])
            ->orderBy('tanggal', 'desc')
            ->first(); // Use first() instead of take(1)->get();

        // If there is no previous record, set values to zero or handle accordingly
        $penggunaan = $data_terakhir ? $validatedData['oddo_terakhir'] - $data_terakhir->oddo_terakhir : 0;
        $harga = GasolineModels::find($validatedData['gasoline_id']);
        $total_liter = $harga ? $validatedData['total_pembelian'] / $harga->harga : 0;

        // Save the Oddo In data to the database
        $model = new gasolineHistoryModels();
        $model->fill($validatedData);
        $model->total_liter = $total_liter;
        $model->total_penggunaan = $penggunaan;
        $model->ratio = $data_terakhir ? $penggunaan / $total_liter : 0; // Set ratio to zero if no previous record
        $model->foto_struk = $filePath;
        $model->save();

        return redirect('/app')->with('success', 'Data bensin berhasil ditambah');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

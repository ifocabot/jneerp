<?php

namespace App\Http\Controllers;

use App\Models\areaModels;
use App\Models\history_checklist;
use App\Models\kendaraanModels;
use App\Models\oddoInModels;
use App\Models\oddoOutModels;
use App\Models\oddoHistoryModels;
use App\Models\safetyToolsModels;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class oddoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('user.OddoOption');
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
        //
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

    public function addOddoIn(){
        $user = Auth::user();
        $users_id = auth()->id();

        $area = areaModels::all();

        return view('user.oddoInView', compact(
            'area',
            'user',
        ));

    }

    public function addOddoOut(){

        $kendaraan = kendaraanModels::all();
        $area = areaModels::all();
        $safety = safetyToolsModels::all();
        $user = Auth::user();


        return view('user.oddoOutView', compact(
            'kendaraan',
            'area',
            'safety',
            'user'
        ));
    }

    public function oddoOutPost(Request $request)
    {
        $userId = auth()->id();

        // Check if there is no existing Oddo In transaction for the user
        $riwayatOddo = oddoHistoryModels::where('users_id', $userId)
            ->whereNull('oddoin_id')
            ->first();

        if ($riwayatOddo) {
            // If there is no valid Oddo In record, redirect the user to the Oddo In page
            return redirect()->route('oddoInView')->with('error', 'Anda harus melakukan Oddo In terlebih dahulu.');
        }

        $validatedData = $request->validate([
                'oddo_meter_out' =>'required',
                'vehicles_id' => 'required',
                'areas_id' => 'required',
                'area_awal_id' => 'required',
                'safetytools_id' => 'required|array',
            ]);

        $validatedData2 = $request->validate([
            'kondisi_body' =>'required',
            'kondisi_lampu_depan' =>'required',
            'kondisi_lampu_belakang' =>'required',
            'kondisi_ban' =>'required',
            'kondisi_ban_serep' =>'required',
            'kondisi_kaca' =>'required',
        ]);
        // Combine the values from the <select> element into a string
        $safetyvalue = implode(',', $validatedData['safetytools_id']);
        $areaarray = implode(',', $validatedData['areas_id']);
        $keterangan = $request->keterangan;

        // Save data to the database
        $model = new OddoOutModels(); // Assuming the correct model name is OddoOutModels
        $model->fill($validatedData);
        $model->areas_id = $areaarray;
        $model->safetytools_id = $safetyvalue;
        $model->save();

        //save checklist
        $model2 = new history_checklist();
        $model2->fill($validatedData2);
        $model2->users_id = $userId;
        $model2->vehicles_id = $validatedData['vehicles_id'];
        $model2->keterangan = $request->keterangan;
        $model2->save();

        $vehiclesId = $model->vehicles_id;
        $asd = $validatedData['oddo_meter_out'];


        // Update is_pickup in KendaraanModels
        KendaraanModels::where('id', $vehiclesId)
            ->update([
                'is_pickup' => '1',
                'is_available' => '0',
                'last_oddo' => $asd
            ]);

        $riwayatOddo = new OddoHistoryModels();
        $riwayatOddo->users_id = $userId;
        $riwayatOddo->oddoOut_id = $model->id;
        $riwayatOddo->vehicles_id = $model->vehicles_id;
        $riwayatOddo->save();

        // Dapatkan informasi user dan kendaraan
        $user = User::find($userId)->name;
        $vehicle = KendaraanModels::find($vehiclesId)->nomor_plat;
        $araeaawal =$validatedData['area_awal_id'];
        $areasawalNama = areaModels::find($araeaawal)->nama_area;

        // Ubah array area_id menjadi string nama area
        $areaIds = explode(',', $areaarray);
        $areaNames = areaModels::whereIn('id', $areaIds)->pluck('nama_area')->toArray();
        $areaNamesString = implode(', ', $areaNames);

        // Siapkan pesan yang akan dikirim
        $contentMessage = "[NOTIFIKASI BOT] \n\nUser {$user} telah keluar menggunakan kendaraan dengan plat nomor {$vehicle} dengan oddo terakhir {$asd}, dari area {$areasawalNama} dengan tujuan {$areaNamesString}";
        $contentMessageifError = "[NOTIFIKASI BOT] \n\n Info Dari User {$user} dengan nopol {$vehicle} \n\n {$keterangan}";

        // Siapkan data yang akan dikirim ke API
        $apiData = [
            'chatId' => '120363186073459433@g.us',
            'contentType' => 'string',
            'content' => $contentMessage
        ];

        $apiData2 = [
            'chatId' => '120363208642448834@g.us',
            'contentType' => 'string',
            'content' => $contentMessageifError
        ];
        // Kirim request ke API endpointContent Message
        $response = Http::post('http://103.191.63.18:9191/client/sendMessage/wawebjs', $apiData);

    $hasValueOtherThanTwo = false;
    foreach ($validatedData2 as $field => $value) {
        if ($value != 2) {
            $hasValueOtherThanTwo = true;
            break;
        }
    }

    // Check if any field has a value other than 3
    $hasValueOtherThanThree = false;
    foreach ($validatedData2 as $field => $value) {
        if ($value != 3) {
            $hasValueOtherThanThree = true;
            break;
        }
    }

    if ($hasValueOtherThanTwo && $hasValueOtherThanThree) {
        Http::post('http://103.191.63.18:9191/client/sendMessage/wawebjs', $apiData2);
    }
        // Periksa apakah request berhasil
        if ($response->successful()) {
            // Proses jika request berhasil
            return redirect('/app')->with('success', 'Data oddo out berhasil ditambah dan pesan terkirim.');
        } else {
            // Proses jika request gagal
            return redirect('/app')->with('error', 'Data oddo out berhasil ditambah tetapi pesan gagal terkirim.');
        }
    }

    public function oddoInPost(Request $request)
    {
        $userId = auth()->id();

        $riwayatTransaksi = OddoHistoryModels::where('users_id', $userId)
            ->whereNull('oddoin_id')
            ->first();

        $lastOddoHistory = OddoHistoryModels::where('users_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();

        $lastOddo = $lastOddoHistory->vehicles_id;

        $lastoddobeneran = KendaraanModels::with(['type_vehicles', 'gasoline'])
            ->where('id', $lastOddo)
            ->first();


            $lastoddov2 = OddoHistoryModels::with('oddoout')
            ->where('users_id', $userId)
            ->orderBy('created_at', 'desc')
            ->first();


            $lastoddo = $lastoddov2->oddoOut->oddo_meter_out;

        // Access the 'ratio' property from TypeVehicles
        $ratio = $lastoddobeneran->type_vehicles->ratio;

        // Access the 'harga' property from Gasoline
        $hargabensin = $lastoddobeneran->gasoline->harga;

        if ($riwayatTransaksi) {
            $validatedData = $request->validate([
                'oddo_meter_in' => [
                    'required',
                    'numeric',
                    function ($attribute, $value, $fail) use ($request, $lastoddo) {
                        // Get the last oddo_out value for the user's last transaction
                        // Check if the last oddo_out value is not null and is numeric
                        if ($lastoddo !== null && is_numeric($lastoddo)) {
                            // Check if the input is less than the last oddo_out value
                            if ($value < $lastoddo || $value > ($lastoddo + 200) || $value == $lastoddo) {
                                $fail('Input oddo meter gagal, masukan angka yang sesuai dengan oddo meter di mesin, angka tidak boleh sama ataupun kurang dari oddo sebelumnya');
                            }
                        } else {
                            // Handle the case where lastoddonomor is not valid (null or non-numeric)
                            $fail('Error in retrieving last oddo meter value. Please try again.');
                        }
                    },
                ],
                'areas_id' => 'required',
                'image' => 'required|image', // Assuming the uploaded file is an image
            ]);


            $oddoMeterIn = $validatedData['oddo_meter_in'];
            $areaid = $validatedData['areas_id'];

            // Calculate the usage of the vehicle
            $usage = $oddoMeterIn - $lastoddo;
            $convertToBensin = floor($usage / $ratio * 100) / 100;
            $convertToCost = $convertToBensin * $hargabensin;

            // Process and save the uploaded image
            $image = $request->file('image');
            $img = Image::make($image)->resize(800, 600)->encode('jpg', 80);
            $fileName = uniqid() . '.jpg';
            $filePath = 'uploads/' . $fileName;
            Storage::disk('public')->put($filePath, $img->stream());

            // Save the Oddo In data to the database
            $model = new OddoInModels(); // Assuming the correct model name is OddoInModels
            $model->fill($validatedData);
            $model->foto_oddo_in = $filePath;
            $model->save();

            // Update the riwayatTransaksi with the ID of the new Oddo In entry
            $riwayatTransaksi->oddoin_id = $model->id;
            $riwayatTransaksi->total_kilometer = $usage;
            $riwayatTransaksi->convert_bensin = $convertToBensin;
            $riwayatTransaksi->cost = $convertToCost;
            $riwayatTransaksi->save();

            // Update last_oddo in KendaraanModels
            KendaraanModels::where('id', $lastOddo)
                ->update([
                    'last_oddo' => $oddoMeterIn,
                    'is_pickup' => '0',
                    'is_available' => '1'
                ]);

                        // Dapatkan informasi user
            $userName = auth()->user()->name;

            // Dapatkan nomor plat kendaraan
            $vehiclePlate = $lastoddobeneran->nomor_plat;

            // Dapatkan last oddo in
            $lastOddoIn = $oddoMeterIn;

            $area = areaModels::find($areaid)->nama_area;

            // Siapkan pesan yang akan dikirim
            $notificationMessage = "[NOTIFIKASI BOT] \n\nUser : {$userName} telah kembali ke {$area} untuk kendaraan dengan plat nomor {$vehiclePlate}. Last oddo in: {$lastOddoIn}.";

            $apiData = [
            'chatId' => '120363186073459433@g.us',
            'contentType' => 'string',
            'content' => $notificationMessage
        ];
        // Kirim request ke API endpoint
        $response = Http::post('http://103.191.63.18:9191/client/sendMessage/wawebjs', $apiData);

        return redirect('/app')->with('success', 'Data oddo in berhasil ditambah', $response);

        } else {
            // Handle the case where the user is trying to create Oddo In without a valid sequence
            return redirect()->back()->with('error', 'Anda belum melakukan oddo out');
        }

    }
    public function cekliskendaraan(){

        $kendaraan = kendaraanModels::all();

        return view('user.formCheckListKendaraan', compact(
            'kendaraan'
        ));
    }
}

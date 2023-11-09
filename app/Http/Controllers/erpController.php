<?php

namespace App\Http\Controllers;

use App\Models\areaModels;
use App\Models\gasolineHistoryModels;
use App\Models\gasolineModels;
use App\Models\kendaraanModels;
use App\Models\oddoHistoryModels;
use App\Models\tipekendaraanModels;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class erpController extends Controller
{
    //DASHBOARD MODUl START

    public function index(){
        $kendaraan = kendaraanModels::all()->count();
        $user = user::all()->count();
        $area = areaModels::all()->count();

        $kendaraanavailable = kendaraanModels::where('is_available','=','1')->count();
        $kendaraansakit = kendaraanModels::where('is_service','=','1')->count();
        $oddohistory = oddoHistoryModels::with(['vehicles','oddoin','users','oddoout'])->orderBy('updated_at','desc')->take('5')->get();

        return view('erp.erpDashboard', compact(
            'kendaraan',
            'user',
            'kendaraanavailable',
            'oddohistory',
            'kendaraansakit',
            'area'
        ));
    }

    //DASHBOARD MODUL END

    // ODDO MODUL START

    public function oddoHistoryview(){

        return view('erp.oddoHistory');
    }

    public function oddoHistoryAjax(Request $request){
        return $request->ajax()
            ? $this->getDataTableResponse($request)
            : abort(404);
    }

    private function getDataTableResponse(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $user = auth()->user();
        $userRole = $user->role;

        $query = oddoHistoryModels::with(['users', 'oddoout', 'oddoout.areas', 'oddoin', 'oddoin.areas', 'vehicles', 'oddoout.area_awal'])
        ->orderByDesc('created_at');

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        if ($userRole == 'super_admin') {
            // Super admin can access all data, no need for additional filtering
        } elseif ($userRole == 'management') {
            // Filter data based on user's division
            $query->whereHas('users', function ($q) use ($user) {
                $q->where('division', $user->division);
            });
        }

        $data = $query->take(1700)->get(); // Adjust the limit as needed

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('sequence', '')
            ->addColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d-m-Y H:i:s ') : null;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at ? $row->updated_at->format('d-m-Y H:i:s ') : null;
            })
            ->addColumn('action', function ($row) {
                if ($row->oddoin && $row->oddoin->foto_oddo_in) {
                    $photoUrl = asset('storage/' . $row->oddoin->foto_oddo_in);
                    return '<button class="btn btn-success btn-sm"> <a href="' . $photoUrl . '" style="color:white" target="_blank">Link Foto</a></button>';
                } else {
                    return '<button class="btn btn-danger btn-sm" disabled>Belum Update</button>';
                }
            })
            ->addColumn('details', function ($row) {
                return '<button class="btn btn-primary btn-sm" id="modal-2">Detail</button>';
            })
            ->addColumn('area_names', function ($row) {
                $areasArray = explode(',', $row->oddoout->areas_id);
                $areaNames = [];

                foreach ($areasArray as $areaCode) {
                    $area = areaModels::where('id', $areaCode)->first();
                    $areaName = $area ? $area->nama_area : 'Area tidak ditemukan';
                    $areaNames[] = $areaName;
                }

                return implode(', ', $areaNames); // Convert array to a comma-separated string
            })
            ->rawColumns(['action', 'sequence', 'details', 'area_names'])
            ->make(true);
    }

    // ODDO MODUL END

    // MOBIL MODUL START

    public function inputMobil(){
        $bensin = gasolineModels::all();
        $tipe = tipekendaraanModels::all();

        return view('erp.erpTambahDataMobil',compact(
            'bensin',
            'tipe'
        ));
    }

    public function tambahMobil(Request $request){

        $validated = $request->validate([
            'nomor_plat'        => 'required|string|max:255', // Adjust validation rules as needed
            'tahun'             => 'required|integer',
            'model_kendaraan'   => 'required|string|max:255',
            'vendor_kendaraan'  => 'required|string|max:255',
            'brand_kendaraan'   => 'required|string|max:255',
            'expire_tax'        => 'required|string|max:255',
            'expire_plat'       => 'required|string|max:255',
            'expire_kir'        => 'required|string|max:255',
            'gasoline_id'       => 'required|integer',
            'type_vehicles_id'  => 'required|integer',
        ]);

        $validated['last_oddo'] = 0;
        $validated['is_active'] = 1;
        $validated['is_available'] = 1;
        $validated['is_service'] = 0;
        $validated['is_pickup'] = 0;


        $vehicle = kendaraanModels::create($validated);

        return redirect()->route('oddo.vehicles')->with('success', 'Vehicle added successfully');
    }

    public function editDataMobi($id,Request $Request){

        $vehicle = kendaraanModels::findOrFail($id);
        $bensin = gasolineModels::all();
        $tipe = tipekendaraanModels::all();


        return view("erp.erpEditDataMobil",compact(
            'vehicle',
            'bensin',
            'tipe'
        ));

    }

    public function prosesEditDataMobil(request $request, $id){

        $vehicle = kendaraanModels::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('oddo.vehicles');

    }

    public function vehiclesview(){
        return view('erp.vehiclesData');
    }

    public function vehiclesAjax(Request $request){
        return $request->ajax()
            ? $this->getDatatableVehicles($request)
            : abort(404);
    }

    private function getDatatableVehicles(Request $request){
        $data = kendaraanModels::with(['gasoline','type_vehicles']);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('sequence', '')
            ->addColumn('details', function ($row) {
                return '<a href="' . route('editDataMobi', ['id' => $row->id]) . '" class="btn btn-primary trigger--fire-modal-2" id="modal-2">Update</a>';
            })
            ->rawColumns(['details'])
            ->make(true);
    }

    //MOBIL MODUL END

    //USERMODUL

    public function daftarUser() {
        return view('erp.daftarUser');
    }

    public function userAjax(Request $request){
        return $request->ajax()
            ? $this->getDataUser($request)
            : abort(404);
    }

    private function getDataUser(Request $request){
        $data = user::orderBy('employee_number','asc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('sequence', '')
            ->addColumn('details', function ($row) {
                return '<a href="' . route('update.user', ['id' => $row->id]) . '" class="btn btn-primary trigger--fire-modal-2" id="modal-2">Update</a>';
            })
            ->rawColumns(['details'])
            ->make(true);
    }

    public function tambahUser(){

        return view('erp.erpTambahUser');
    }

    public function prosesTambahUser(Request $request){
        $validated = $request->validate([
            'employee_number' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Validasi email dan pastikan unik di tabel "users"
            'password' => 'required|min:8', // Anda bisa menambahkan aturan lebih lanjut untuk password
            'division' => 'required',
            'user_low_end' => 'required',
        ]);

        // Anda mungkin ingin mengenkripsi password sebelum menyimpannya ke database
        $validated['password'] = bcrypt($validated['password']);

        // Tambahkan user ke database
        $user = User::create($validated);

        // Berikan pesan sukses atau tindakan lainnya setelah menambahkan user
        return redirect()->route('daftarUser'); // Gantilah 'nama_rute' dengan rute yang sesuai
    }

    public function updateUser($id){

        $user = User::findOrFail($id);

        return view('erp.erpEditUser',compact('user'));
    }

    public function prosesUpdateUser(request $request, $id) {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('daftarUser');
    }

    //USER MODUL END

    //BENSIN MODUL START

    public function dataBensin (){

        return view ('erp.erpBensinHistory');
    }

    public function bensinAjax(Request $request){
        return $request->ajax()
            ? $this->getDataBensin($request)
            : abort(404);
    }

    private function getDataBensin(Request $request) {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Start with the base query
        $bensinQuery = gasolineHistoryModels::with(['users', 'gasoline', 'vehicles'])->orderByDesc('created_at');

        // Apply date filters if start_date and end_date are provided
        if ($startDate) {
            $bensinQuery->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $bensinQuery->whereDate('created_at', '<=', $endDate);
        }

        // Continue with the rest of your logic
        $data = $bensinQuery->take(1000)->get(); // Adjust the limit as needed

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('d-m-Y H:i:s ') : null;
            })
            ->addColumn('sequence', function($row) {
                return $row->id; // Use an appropriate field for sequence.
            })
            ->addColumn('details', function ($row) {
                $photoUrl = asset('storage/' . $row->foto_struk);
                return '<button class="btn btn-success btn-sm"><a href="' . $photoUrl . '" style="color:white" target="_blank">Link Foto</a></button>';
            })
            ->rawColumns(['details'])
            ->make(true);
    }

    public function detailsMobil () {
        // Mengambil semua data dari tabel GasolineHistory
        $gasolineHistories = gasolineHistoryModels::orderBy('created_at', 'asc')
        ->groupBy('vehicles_id')
        ->get();

        // Inisialisasi array untuk menyimpan data per kendaraan
        $dataPerKendaraan = [];

        foreach ($gasolineHistories as $gasolineHistory) {
            // Mengambil data kendaraan terkait
            $vehicle = kendaraanModels::find($gasolineHistory->vehicles_id);
            $plat = $vehicle->nomor_plat;

            // Mengambil data ratio dari model typeKendaraan
            $typeKendaraan = tipekendaraanModels::find($vehicle->type_vehicles_id);
            $ratio = $typeKendaraan->ratio;

            // Mengambil data harga bensin
            $hargabensin = gasolineModels::find($gasolineHistory->gasoline_id);

            // Menghitung nilai yang diperlukan
            $harga = $hargabensin->harga;
            $odoMobil = $vehicle->last_oddo;
            $odoPengisian = $gasolineHistory->oddo_terakhir;
            $totalPembelian = $gasolineHistory->total_pembelian;

            $totalLiter = $totalPembelian / $harga;
            $penggunaan = ($odoMobil - $odoPengisian) / $ratio;
            $totalPenggunaan = 38 - $penggunaan;
            $totalBensinSaatIni = ($totalPenggunaan / 38) * 100;

            $estimasiPembelian = $penggunaan * $harga;

            // Menambahkan data per kendaraan ke array
            $dataPerKendaraan[] = [
                'vehicle' => $vehicle,
                'plat' => $plat,
                'ratio' => $ratio,
                'harga' => $harga,
                'odoMobil' => $odoMobil,
                'odoPengisian' => $odoPengisian,
                'totalPembelian' => $totalPembelian,
                'totalLiter' => $totalLiter,
                'penggunaan' => $penggunaan,
                'totalPenggunaan' => $totalPenggunaan,
                'totalBensinSaatIni' => $totalBensinSaatIni,
                'estimasiPembelian' => $estimasiPembelian,
            ];
        }

        // Pass data ke view
        return view('erp.erpMonitorBensin', compact('dataPerKendaraan'));
    }

    //BENSIN MODUL END

    //AREA MODUL START

    public function listArea() {

        $area = areaModels::all();

        return view('erp.erpAreaCoverage', compact(
            'area',
        ));
    }

    public function addArea(Request $request) {
        $validated = $request->validate([
            'nama_area' => 'required',
            'div_area' => 'required',
        ]);

        // Tambahkan user ke database
        $area = areaModels::create($validated);

        // Berikan pesan sukses atau tindakan lainnya setelah menambahkan user
        return redirect()->route('daftarArea'); // Gantilah 'nama_rute' dengan rute yang sesuai

    }


    //AREA MODUL END

}

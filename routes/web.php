    <?php

    use App\Http\Controllers\bensinController;
    use App\Http\Controllers\erpController;
    use App\Http\Controllers\kendaraanController;
    use App\Http\Controllers\oddoController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\userController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    route::middleware(['auth','role:super_admin,admin,management'])->group(function(){

        //dashboard
        route::get('/erp',[erpController::class,'index'])->name('erp.dashboard');

        //oddoModul
        route::get('/erp/oddohistory',[erpController::class,'oddoHistoryview'])->name('oddo.history');
        route::get('/erp/oddohistoryajax',[erpController::class,'oddoHistoryAjax'])->name('oddo.history.data');

        //mobilModul
        route::get('/erp/vehicles',[erpController::class,'vehiclesview'])->name('oddo.vehicles');
        route::get('/erp/vehicles/{id}',[erpController::class,'detailMobilPenuh'])->name('detailMobilPenuh');
        route::get('/erp/vehiclesajax',[erpController::class,'vehiclesAjax'])->name('oddo.vehicles.data');
        route::get('/erp/tambahmobil',[erpController::class,'inputMobil'])->name('inputMobil');
        route::post('/erp/prosesTambahMobil',[erpController::class,'tambahMobil'])->name('prosesTambahMobil');
        Route::get('/erp/editdatamobil/{id}', [erpController::class, 'editDataMobi'])->name('editDataMobi');
        Route::post('/erp/editdatamobil/{id}',[erpController::class,'prosesEditDataMobil'])->name('prosesEditDataMobil');

        //userModul
        route::get('/erp/daftaruser',[erpController::class,'daftarUser'])->name('daftarUser');
        route::get('/erp/userAjax',[erpController::class,'userAjax'])->name('oddo.user.data');
        route::get('/erp/tambahUser',[erpController::class,'tambahUser'])->name('tambahUser');
        route::post('/erp/prosesTambahUser',[erpController::class,'prosesTambahUser'])->name('prosesTambahUser');
        route::get('/erp/updateUser/{id}',[erpController::class,'updateUser'])->name('update.user');
        route::post('/erp/updateUser/{id}',[erpController::class,'prosesUpdateUser'])->name('prosesUpdateUser');


        //bensinmodul
        route::get('/erp/databensintiapmobil',[erpController::class,'detailsMobil'])->name('datebensin2');
        route::get('/erp/bensinhistory',[erpController::class,'dataBensin'])->name('databensin');
        route::get('/erp/bensinAjax',[erpController::class,'bensinAjax'])->name('bensin.ajax');

        //areaModul
        route::get('erp/daftararea',[erpController::class,'listArea'])->name('daftarArea');
        route::post('erp/daftararea/proses',[erpController::class,'addArea'])->name('tambahArea');
    });

    route::middleware(['auth','role:user,management,super_admin'])->group(function(){


        //MENU
        route::get('/app',[userController::class,'index'])->name('userIndex');

        //INPUT ODDO
        route::get('/app/oddoOption',[oddoController::class,'index'])->name('oddoOption');
        route::get('/app/oddoOutView',[oddoController::class,'addOddoOut'])->name('oddoOutView');
        route::post('/app/oddoOutPost',[oddoController::class,'oddoOutPost'])->name('oddoOutPost');
        route::get('/app/oddoInView',[oddoController::class,'addOddoIn'])->name('oddoInView');
        route::post('/app/oddoInPost',[oddoController::class,'oddoInPost'])->name('oddoInPost');

        //INPUT BENSIn

        route::get('/app/bensininput',[bensinController::class,'index'])->name('inputbensin');
        route::post('/app/prosesbensininput',[bensinController::class,'store'])->name('prosesinputbensin');
    });


    require __DIR__.'/auth.php';


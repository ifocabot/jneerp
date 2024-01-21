    <?php

    use App\Http\Controllers\bensinController;
    use App\Http\Controllers\erpController;
    use App\Http\Controllers\kendaraanController;
    use App\Http\Controllers\oddoController;
    use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ticketController;
use App\Http\Controllers\ticketingController;
use App\Http\Controllers\userController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |-------------------------------------------------------a-------------------
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
        Route::get('/erp/get-chart-data/{carId}', [erpController::class, 'getChartData'])->name('chartbensin');
        Route::get('/erp/get-chart-data-ratio/{carId}', [erpController::class, 'getChartDataRatio'])->name('chartratio');


        //oddoModul
        route::get('/erp/oddohistory',[erpController::class,'oddoHistoryview'])->name('oddo.history');
        route::get('/erp/oddohistoryajax',[erpController::class,'oddoHistoryAjax'])->name('oddo.history.data');

        //mobilModul
        route::get('/erp/vehicles',[erpController::class,'vehiclesview'])->name('oddo.vehicles');
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

        //checklist
        route::get('erp/checklist',[erpController::class,'CheckList'])->name('CheckList');

        //ticketing
        route::get('erp/ticketDashboard',[ticketController::class,'index'])->name('ticket.dashboard');
        route::get('erp/ticket/create',[ticketController::class,'create'])->name('ticket.create');
        route::post('erp/ticket/postTicket',[ticketController::class,'store'])->name('ticket.post');
        route::get('erp/ticket/inbox',[ticketController::class,'inbox'])->name('ticket.inbox');
        route::get('/erp/ticket/ticketajax',[ticketController::class,'ticketAjax'])->name('ticket.ajax');
        route::get('/erp/tickets/{id}',[ticketController::class,'viewTicket'])->name('ticket.view');
        route::get('/erp/ticket/ticketoutgoingajax',[ticketController::class,'outgoingTicketAjax'])->name('ticket.out.ajax');
        Route::post('/erp/ticketaccept/{id}', [TicketController::class, 'acceptTicket'])->name('ticket.accept');
        Route::post('/erp/tickethold/{id}', [TicketController::class, 'holdTicket'])->name('ticket.hold');
        Route::post('/erp/ticketclose/{id}', [TicketController::class, 'closeTicket'])->name('ticket.close');

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

        //Input Ceklis

        Route::get('/app/checklistkendaraan',[oddoController::class,'cekliskendaraan'])->name('inputcekliskendaraan');
    });


    require __DIR__.'/auth.php';


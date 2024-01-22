<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\tickets;
use Illuminate\Support\Facades\Auth;

class InboxCountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
public function boot()
{
    view()->composer('*', function ($view) {
        // Inisialisasi inboxCount dengan nilai default
        $inboxCount = 0;

        // Pengecekan apakah pengguna telah terotentikasi
        if (Auth::check()) {
            // Mencari jumlah tiket di inbox yang belum diterima
            $inboxCount = tickets::where('target_id', Auth::user()->id)
                ->where('is_it_accepted', false) // Sesuaikan dengan tipe data kolom is_it_accepted
                ->count();
        }

        // Mengirimkan variabel 'inboxCount' ke semua view
        $view->with('inboxCount', $inboxCount);
    });
}



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

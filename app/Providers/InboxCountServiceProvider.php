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
        // Pengecekan apakah pengguna telah terotentikasi
        if (Auth::check()) {
            $inbox = tickets::where('target_id', Auth::user()->id)
                ->where('is_it_accepted', 0)
                ->count();
        } else {
            $inbox = 0; // Set nilai default jika pengguna belum terotentikasi
        }

        //...with this variable
        $view->with('inboxCount', $inbox);
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

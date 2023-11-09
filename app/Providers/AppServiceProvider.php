<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Validator::extend('base64image', function ($attribute, $value, $parameters, $validator) {
        $data = base64_decode(preg_replace('/^data:image\/\w+;base64,/', '', $value));
        $f = finfo_open();
        $mime = finfo_buffer($f, $data, FILEINFO_MIME_TYPE);

        return Str::startsWith($mime, 'image/');
    });
    }
}

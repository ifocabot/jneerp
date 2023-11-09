<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APP JNE-PM</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.svg') }}">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

</head>

<body class="">

    <nav class="border-white bg-gradient-to-r from-cyan-500 to-blue-500">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex flex-wrap items-center justify-between">
                <div class="ml-4 md:mb-0 md:flex md:flex-col md:items-start">
                    <p class="font-sans text-xl font-bold tracking-wide text-white uppercase">{{ Auth::user()->name }}
                    </p>
                    <p class="text-sm font-semibold tracking-tight text-white uppercase">{{ Auth::user()->division }}
                    </p>
                </div>
                <a href="{{route('userIndex')}}" class="flex items-center md:ml-2">
                    <img src="{{ asset('img/logo.svg') }}" class="h-36" alt=" JNE Logo" />
                </a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto">
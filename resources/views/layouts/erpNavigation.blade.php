<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ERP - JNE Puri Mansion</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="mr-auto form-inline">
                    <ul class="mr-3 navbar-nav">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img src="https://www.hitoko.co.id/blog/wp-content/uploads/2022/12/kenali-joni-jne-untuk-bisnis-1-1024x900.jpg"
                                class="mr-1 rounded-circle">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="{{route('profile.edit')}}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a href="#" onclick="document.getElementById('logout-form').submit();"
                                    class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('erp.dashboard') }}">ERP JNEPM</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('erp.dashboard') }}">Erp</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="nav-item dropdown {{ request()->routeIs('erp.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown"><i
                                    class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('erp.dashboard') }}">Fleet Dashboard</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Starter</li>
                        <li class="nav-item dropdown {{ request()->routeIs('oddo.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Fleet Management</span></a>
                            <ul class="dropdown-menu">
                                <li class="{{ request()->routeIs('oddo.history') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('oddo.history') }}">Oddo History</a></li>
                                <li class="{{ request()->routeIs('oddo.vehicles') ? 'active' : '' }}"><a
                                        class="nav-link" href="{{ route('oddo.vehicles') }}">Data Kendaraan</a></li>
                                <li class="{{ request()->routeIs('databensin') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('databensin') }}">Data Pengisian Bensin</a></li>
                                <li class="{{ request()->routeIs('daftarArea') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('daftarArea') }}">Area Coverage</a></li>
                                <li class="{{ request()->routeIs('datebensin2') ? 'active' : '' }}"><a class="nav-link"
                                        href="{{ route('datebensin2') }}">Monitoring BBM (experimental)</a></li>
                                <li><a class="nav-link" href="#">Service Management</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>User
                                    Management</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('daftarUser') }}">Daftar User</a></li>
                            </ul>
                        </li>
                        <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
                            <li class="menu-header">Butuh bantuan ?</li>
                            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                                <i class="fas fa-rocket"></i> TICKETING
                            </a>
                        </div>
                </aside>
            </div>

            <div class="main-content">
@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Karyawan</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            {{ $kendaraan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Area Coverage</h4>
                        </div>
                        <div class="card-body">
                            {{ $area }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kendaraan dalam perbaikan</h4>
                        </div>
                        <div class="card-body">
                            {{ $kendaraansakit }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card-->
            <div class="col-md-6">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>{{ $kendaraanavailable }}</h4>
                        <div class="card-description">Kendaraan Tersedia</div>
                    </div>
                    <div class="p-0 card-body">
                        <div class="tickets-list">
                            @foreach ($oddohistory as $oddo)
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>{{ $oddo->vehicles->nomor_plat }} - {{ $oddo->oddoin_id ? 'Sudah sampai' :
                                        'Sedang dalam perjalanan' }}</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>{{ $oddo->users->name }}</div>
                                    <i class="fa fa-arrow-right" aria-hidden="true"
                                        style="padding-left:10px; padding-right:10px; padding-top:3px "></i>
                                    @if(is_null($oddo->oddoin_id))
                                    <div class="text-primary">{{ $oddo->oddoout->areas->nama_area }}</div>
                                    @else
                                    <div class="text-primary">{{ $oddo->oddoin->areas->nama_area }}</div>
                                    @endif
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@include('layouts.erpFooter')
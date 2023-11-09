@include('layouts.erpNavigation')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Monitoring BBM</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Monitoring BBM ( WIP / IN DEVELOPMENT)</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-danger alert-has-icon">
                            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                            <div class="alert-body">
                                <div class="alert-title">Danger</div>
                                Menggunakan data aktual, menggunakan ratio yang masih belum fix, belum dapat dijadikan
                                acuan. | Note : Tingkat % sudah berubah setiap ada pemakaian kendaraan. <br> Data
                                dibawah hanya grandmax
                            </div>
                        </div>
                        @foreach ($dataPerKendaraan as $data)
                        <div class="mb-4">
                            <div class="float-right text-small font-weight-bold text-muted">{{
                                number_format($data['totalBensinSaatIni'], 1) }} / 100
                            </div>
                            <div class="mb-1 font-weight-bold">{{ $data['plat']}}</div>
                            <div class="progress" data-height="3" style="height: 3px;">
                                <div class="progress-bar @if ($data['totalBensinSaatIni'] < 40) bg-danger @elseif ($data['totalBensinSaatIni'] < 70) bg-warning @else bg-success @endif"
                                    role="progressbar" data-width="{{ $data['totalBensinSaatIni'] }}%"
                                    aria-valuenow="{{ $data['totalBensinSaatIni'] }}" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $data['totalBensinSaatIni'] }}%;"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('layouts.erpFooter')
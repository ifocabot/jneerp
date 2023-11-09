@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Data Kendaraan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tabel Data Mobil</h4>
                        <a href="{{ route('inputMobil') }}" class="btn btn-success btn-lg">Tambah Mobil Baru</a>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="dataMobil" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Tahun</th>
                                        <th>Model Kendaraan</th>
                                        <th>Vendor Kendaraan</th>
                                        <th>Brand Kendaraan</th>
                                        <th>Jenis Bensin</th>
                                        <th>Tipe Mobil</th>
                                        <th>Expire Tax</th>
                                        <th>Expire Plat</th>
                                        <th>Expire Kir</th>
                                        <th>Last Oddo Meter</th>
                                        <th>Edit Data</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.erpFooter')
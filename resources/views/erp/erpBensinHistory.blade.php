@include('layouts.erpNavigation')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Histori Pengisian BBM</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Pengisian BBM</h4>
                    </div>
                    <div class="card-body">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date_bensin">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date_bensin" style="margin-bottom: 10px">
                        <div class="table-responsive">
                            <table id="datahistoribensin" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Driver</th>
                                        <th>Tipe Bensin</th>
                                        <th>Oddo Meter</th>
                                        <th>Total Pembelian</th>
                                        <th>Total dalam Liter</th>
                                        <th>Lokasi</th>
                                        <th>Timestamp</th>
                                        <th>Foto struk</th>
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
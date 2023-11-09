@include('layouts.erpNavigation')

<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Histori Perjalanan</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tabel Oddo History</h4>
                    </div>
                    <div class="card-body">
                        <label for="start_date">Start Date:</label>
                        <input type="date" id="start_date">
                        <label for="end_date">End Date:</label>
                        <input type="date" id="end_date" style="margin-bottom: 10px">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User Name</th>
                                        <th>Division</th>
                                        <th>Oddo Meter Out</th>
                                        <th>Oddo Meter In</th>
                                        <th>Total Penggunaan</th>
                                        <th>Penggunaan Bensin</th>
                                        <th>Nomor Plat</th>
                                        <th>Dari</th>
                                        <th>Tujuan</th>
                                        <th>Stamp In</th>
                                        <th>Timestamp OddoOut</th>
                                        <th>Timestamp OddoIn</th>
                                        <th>Foto Oddo</th>
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
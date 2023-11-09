@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Data User</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tabel Data User</h4>
                        <a href="{{ route('tambahUser') }}" class="btn btn-success btn-lg">Tambahh Data User</a>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="dataUser" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Employee</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Division</th>
                                        <th>Role</th>
                                        <th>Details</th>
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
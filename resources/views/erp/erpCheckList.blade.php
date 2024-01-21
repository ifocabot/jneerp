@include('layouts.erpNavigation')

@php
function getIconClass($value) {
switch ($value) {
case 1:
return 'fas fa-check text-success'; // Green color for checkmark
case 2:
return 'fas fa-exclamation-triangle text-warning'; // Yellow color for warning
case 3:
return 'fas fa-times text-danger'; // Red color for X
default:
return ''; // Empty string for unknown condition
}
}
@endphp


<section class="section">
    <div class="section-header">
        <h1>Area Coverage</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tabel Check List</h4>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Kendaraan</th>
                                        <th>Kondisi Body</th>
                                        <th>Kondisi Lampu (Depan)</th>
                                        <th>Kondisi Lampu (Belakang)</th>
                                        <th>Kondisi Ban</th>
                                        <th>Kondisi Ban Serep</th>
                                        <th>Kondisi Kaca</th>
                                        <th>Keterangan</th>
                                        <th>Time Stamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($check as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->users_id }}</td>
                                        <td>{{ $a->vehicles_id }}</td>
                                        <td><i class="{{ getIconClass($a->kondisi_body) }}"></i></td>
                                        <td><i class="{{ getIconClass($a->kondisi_lampu_depan) }}"></i></td>
                                        <td><i class="{{ getIconClass($a->kondisi_lampu_belakang) }}"></i></td>
                                        <td><i class="{{ getIconClass($a->kondisi_ban) }}"></i></td>
                                        <td><i class="{{ getIconClass($a->kondisi_ban_serep) }}"></i></td>
                                        <td><i class="{{ getIconClass($a->kondisi_kaca) }}"></i></td>
                                        <td>{{ $a->keterangan }}</td>
                                        <td>{{ $a->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>

@include('layouts.erpFooter')
@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Area Coverage</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tambah Data Area</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tambahArea') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>NAMA AREA</label>
                                <input type="text" class="form-control" name="nama_area">
                            </div>
                            <div class="form-group">
                                <label>AREA DIVISION</label>
                                <select class="form-control" name="div_area">
                                    <option value="delivery">DELIVERY</option>
                                    <option value="inbound">INBOUND</option>
                                    <option value="outbound">OUTBOUND</option>
                                    <option value="global">GLOBAL</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tabel Area</h4>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Area</th>
                                        <th>Divisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($area as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->nama_area }}</td>
                                        <td>{{ $a->div_area }}</td>
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
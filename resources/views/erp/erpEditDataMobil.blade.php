@include('layouts.erpNavigation')



<section class="section">
    <div class="section-header">
        <h1>Data Kendaraan</h1>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Update Data Mobill</h4>
                    </div>
                    <div class=" card-body">
                        <form action="{{ route('prosesEditDataMobil', ['id' => $vehicle->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>PLAT NOMOR</label>
                                <input type="text" class="form-control" name="nomor_plat"
                                    value="{{ $vehicle->nomor_plat }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>TAHUN KENDARAAN</label>
                                <input type="text" class="form-control" name="tahun" value="{{ $vehicle->tahun }}">
                            </div>
                            <div class="form-group">
                                <label>MODEL KENDARAAN</label>
                                <input type="text" class="form-control" name="model_kendaraan"
                                    value="{{ $vehicle->model_kendaraan }}">
                            </div>
                            <div class="form-group">
                                <label>VENDOR KENDARAAN</label>
                                <input type="text" class="form-control" name="vendor_kendaraan"
                                    value="{{ $vehicle->vendor_kendaraan }}">
                            </div>
                            <div class="form-group">
                                <label>BRAND KENDARAAN</label>
                                <input type="text" class="form-control" name="brand_kendaraan"
                                    value="{{ $vehicle->brand_kendaraan }}">
                            </div>
                            <div class="form-group">
                                <label>EXPIRE TAX</label>
                                <input type="text" class="form-control datepicker" name="expire_tax"
                                    value="{{ $vehicle->expire_tax }}">
                            </div>
                            <div class=" form-group">
                                <label>EXPIRE PLAT</label>
                                <input type="text" class="form-control datepicker" name="expire_plat"
                                    value="{{ $vehicle->expire_plat }}">
                            </div>
                            <div class="form-group">
                                <label>EXPIRE KIR</label>
                                <input type="text" class="form-control datepicker" name="expire_kir"
                                    value="{{ $vehicle->expire_kir }}">
                            </div>
                            <div class="form-group">
                                <label>TIPE BENSIN</label>
                                <select class="form-control" name="gasoline_id">
                                    <option value="-" selected>------</option>
                                    @foreach ($bensin as $t )
                                    <option value="{{ $t->id }}">{{ $t->nama_bensin }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="control-label">AKTIF</div>
                                <label class="mt-2">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" class="custom-switch-input" value="1" {{
                                        $vehicle->is_active == 1 ?
                                    'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-warning">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.erpFooter')
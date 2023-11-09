@include('layouts.erpNavigation')



<section class="section">
    <div class="section-header">
        <h1>Data User</h1>
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
                        <h4>Tambah Data User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('prosesUpdateUser', ['id' => $user->id]) }}" method="POST"> @csrf
                            <div class="form-group">
                                <label>KODE KARYAWAN</label>
                                <input type="text" class="form-control" name="employee_number" placeholder="RKS"
                                    value="{{ $user->employee_number }}">
                            </div>
                            <div class="form-group">
                                <label>NAMA</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="form-group">
                                <label>DIVISION</label>
                                <select class="form-control" name="division">
                                    <option value="crm" {{ old('division', $user->division) === 'crm' ? 'selected' : ''
                                        }}>CRM</option>
                                    <option value="delivery" {{ old('division', $user->division) === 'delivery' ?
                                        'selected' : '' }}>DELIVERY
                                    </option>
                                    <option value="hrd" {{ old('division', $user->division) === 'hrd' ? 'selected' : ''
                                        }}>HRD</option>
                                    <option value="inbound" {{ old('division', $user->division) === 'inbound' ?
                                        'selected' : '' }}>INBOUND</option>
                                    <option value="outbound" {{ old('division', $user->division) === 'outbound' ?
                                        'selected' : '' }}>OUTBOUND
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="control-label">DEVICE LAWAS</div>
                                <label class="mt-2">
                                    <input type="hidden" name="user_low_end" value="0">
                                    <input type="checkbox" name="user_low_end" class="custom-switch-input" value="1" {{
                                        $user->user_low_end == 1 ?
                                    'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.erpFooter')
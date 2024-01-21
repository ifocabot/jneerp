</div>
</div>
</div>

<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> <span>IT Div</span>
    </div>
    <div class="footer-right">
        0.0.1
    </div>
</footer>
</div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/daterangepicker.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#assignee_id').select2();
    });
</script>

<script>
    $(document).ready(function() {
    $('#cc_users').select2();
    });
</script>

<script>
    $(document).ready(function() {
    table = $('#myTable').DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        columns: [
            { data: 'sequence', name: 'sequence', render: function(data, type, row, meta) { return meta.row + 1; } },
            { data: 'users.name', name: 'users.name' },
            { data:'users.division', name:'users.division'},
            { data: 'oddoout.oddo_meter_out', name: 'oddoout.oddo_meter_out' },
            { data: 'oddoin.oddo_meter_in', name: 'oddoin.oddo_meter_in' },
            { data: 'total_kilometer', name: 'total_kilometer' },
            { data: 'convert_bensin', name: 'convert_bensin' },
            { data: 'vehicles.nomor_plat', name: 'vehicles.nomor_plat' },
            {
            data: 'oddoout.area_awal.nama_area',
            name: 'oddoout.area_awal.nama_area',
            render: function(data, type, row) {
            return data ? data : 'Nama Area Tidak Tersedia';
            }
            },
            {
                data: 'area_names',
                name: 'area_names'
            },
            {
                data: 'oddoin.areas.nama_area',
                name: 'oddoin.areas.nama_area',
                render: function(data, type, row) {
                return data ? data : 'Nama Area Tidak Tersedia';
            }
            },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action' },
        ],
        ajax: {
            url: '{{route("oddo.history.data")}}',
            type: 'GET',
            data: function(d) {
                // Hanya ambil tanggal jika tidak ada tanggal yang dipilih
                if (!$('#start_date').val() && !$('#end_date').val()) {
                    d.start_date = null;
                    d.end_date = null;
                } else {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            }
        }
    });

    $('#start_date, #end_date').on('change', function() {
        // Memperbarui parameter tanggal di AJAX
        table.ajax.reload();
    });
});
</script>


<script>
    $(document).ready(function() {
        test = $('#dataMobil').DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        columns: [{
                    data: 'sequence',
                    name: 'sequence',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'nomor_plat',
                    name: 'nomor_plat'
                },
                {
                    data: 'tahun',
                    name: 'tahun'
                },
                {
                    data: 'model_kendaraan',
                    name: 'model_kendaraan'
                },
                {
                    data: 'vendor_kendaraan',
                    name: 'vendor_kendaraan'
                },
                {
                    data: 'brand_kendaraan',
                    name: 'brand_kendaraan'
                },
                { data:'gasoline.nama_bensin', name:'gasloine.nama_bensin'},
                { data:'type_vehicles.nama_tipe', name:'type_vehicles.nama_tipe'},
                {
                    data: 'expire_tax',
                    name: 'expire_tax'
                },
                {
                    data: 'expire_plat',
                    name: 'expire_plat'
                },
                {
                    data: 'expire_kir',
                    name: 'expire_kir'
                },
                {
                    data: 'last_oddo',
                    name: 'last_oddo'
                },
                {
                    data : 'details',
                    name: 'details'
                }
            ],
            ajax: {
                url: '{{ route("oddo.vehicles.data") }}',
                type: 'GET',
                data: function(d) {
                    // Hanya ambil tanggal jika tidak ada tanggal yang dipilih
                    if (!$('#start_date').val() && !$('#end_date').val()) {
                        d.start_date = null;
                        d.end_date = null;
                    } else {
                        d.start_date = $('#start_date').val();
                        d.end_date = $('#end_date').val();
                    }
                }
            }
        });

        $('#start_date, #end_date').on('change', function() {
            // Memperbarui parameter tanggal di AJAX
            test.ajax.reload();
        });
    });
</script>

<script>
    $(document).ready(function() {
        test = $('#dataUser').DataTable({
        pageLength : 25,
        processing: true,
        serverSide: false,
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        columns: [{
                    data: 'sequence',
                    name: 'sequence',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'employee_number',
                    name: 'employee_number'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'division',
                    name: 'division'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'details',
                    name: 'details'
                }
            ],

            ajax: {
                url: '{{ route("oddo.user.data") }}',
                type: 'GET',
            }
        });

        $('#start_date, #end_date').on('change', function() {
            // Memperbarui parameter tanggal di AJAX
            test.ajax.reload();
        });
    });
</script>

<script>
    $(document).ready(function() {
        var tableBensin = $('#datahistoribensin').DataTable({
        pageLength: 25,
        processing: true,
        serverSide: false, // Enable server-side processing
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            split: [ 'pdf', 'excel'],
        }],
        columns: [{
                    data: 'sequence',
                    name: 'sequence',
                    render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
                },
                {
                    data: 'vehicles.nomor_plat',
                    name: 'vehicles.nomor_plat'
                },
                {
                    data: 'vehicles.model_kendaraan',
                    name: 'vehicles.model_kendaraan'
                },
                {
                    data: 'vehicles.type_vehicles.nama_tipe',
                    name: 'vehicles.type_vehicles.nama_tipe'
                },
                {
                    data: 'users.name',
                    name: 'users.name'
                },
                {
                    data: 'gasoline.nama_bensin',
                    name: 'gasoline.nama_bensin'
                },
                {
                    data: 'oddo_terakhir',
                    name: 'oddo_terakhir'
                },
                {
                    data: 'total_pembelian',
                    name: 'total_pembelian'
                },
                {
                    data: 'total_liter',
                    name: 'total_liter'
                },
                {
                    data: 'total_penggunaan',
                    name: 'total_penggunaan'
                },
                {
                    data : 'ratio',
                    name : 'ratio'
                },
                {
                    data: 'lokasi_pengisian',
                    name: 'lokasi_pengisian'
                },
                {
                    data: 'tanggal',
                    name: 'tanggal_2'
                },
                {
                    data:'tanggal',
                    name:'tanggal'
                },
                {
                    data: 'details',
                    name: 'details'
                },
        ],

        ajax: {
            url: '{{ route("bensin.ajax") }}',
            type: 'GET',
            data: function(d) {
            // Send start_date and end_date to the server
            d.start_date = $('#start_date_bensin').val();
            d.end_date = $('#end_date_bensin').val();
            }
        }
        });

        $('#start_date_bensin, #end_date_bensin').on('change', function() {
            // Update the DataTable instance to apply date range filters
            tableBensin.ajax.reload();
        });
    });
</script>


</body>

</html>
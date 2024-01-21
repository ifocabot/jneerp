@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Fleet Dashboard</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kendaraan</h4>
                        </div>
                        <div class="card-body">
                            {{ $kendaraan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Area Coverage</h4>
                        </div>
                        <div class="card-body">
                            {{ $area }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kendaraan dalam perbaikan</h4>
                        </div>
                        <div class="card-body">
                            {{ $kendaraansakit }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card-->
            <div class="col-md-6">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4>{{ $kendaraanavailable }}</h4>
                        <div class="card-description">Kendaraan Tersedia</div>
                    </div>
                    <div class="p-0 card-body">
                        <div class="tickets-list">
                            @foreach ($oddohistory as $oddo)
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>{{ $oddo->vehicles->nomor_plat }} - {{ $oddo->oddoin_id ? 'Sudah sampai' :
                                        'Sedang dalam perjalanan' }}</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>{{ $oddo->users->name }}</div>
                                    <i class="fa fa-arrow-right" aria-hidden="true"
                                        style="padding-left:10px; padding-right:10px; padding-top:3px "></i>
                                    @if(is_null($oddo->oddoin_id))
                                    <div class="text-primary">{{ $oddo->oddoout->areas->nama_area }}</div>
                                    @else
                                    <div class="text-primary">{{ $oddo->oddoin->areas->nama_area }}</div>
                                    @endif
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Total Kilometer</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myLineChart" height="172"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pembelian Bensin Tiap Mobil</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 d-flex">
                            <select id="carDropdownType2" class="mr-2 form-control col-md-3 col-lg-3">
                                @foreach ($vehiclestype as $vehicle)
                                <option value="{{ $vehicle->type_vehicles->id }}">{{ $vehicle->type_vehicles->nama_tipe
                                    }}</option>
                                @endforeach
                            </select>
                            <select id="carDropdown" class="form-control col-md-3 col-lg-3">
                                @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" data-type="{{ $vehicle->type_vehicles->id }}">{{
                                    $vehicle->nomor_plat }}
                                    | {{ $vehicle->type_vehicles->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex">
                            <canvas id="gasolineMobil" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Rasio Bensin Tiap Mobil</h4>
                    </div>
                    <div class="mb-3 card-body d-flex flex-column">
                        <div class="mb-3 d-flex">
                            <select id="carDropdownType" class="mr-2 form-control col-md-3 col-lg-3">
                                @foreach ($vehiclestype as $vehicle)
                                <option value="{{ $vehicle->type_vehicles->id }}">{{ $vehicle->type_vehicles->nama_tipe
                                    }}</option>
                                @endforeach
                            </select>
                            <select id="carDropdownRatio" class="form-control col-md-3 col-lg-3">
                                @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" data-type="{{ $vehicle->type_vehicles->id }}">{{
                                    $vehicle->nomor_plat }}
                                    | {{ $vehicle->type_vehicles->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex">
                            <canvas id="ratio" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pembelian Bensin</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="grafikbensin" width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var dateRanges = [];
    var weeks = [];
    var inboundData = [];
    var outboundData = [];
    var deliveryData = [];

    // Process inbound data
    @foreach ($inboundData as $data)
        weeks.push('Week ' + {{ $data->week_number }} + ', ' + {{ $data->year_number }});
        dateRanges.push('{{ $data->start_date }} - {{ $data->end_date }}');
        inboundData.push({ value: {{ $data->total_kilometer_per_week }} });
    @endforeach

    // Process outbound data
    @foreach ($outboundData as $data)
        dateRanges.push('{{ $data->start_date }} - {{ $data->end_date }}');
        outboundData.push({ value: {{ $data->total_kilometer_per_week }} });
    @endforeach

    // Process delivery data
    @foreach ($deliveryData as $data)
        dateRanges.push('{{ $data->start_date }} - {{ $data->end_date }}');
    deliveryData.push({ value: {!! $data->total_kilometer_per_week !== null ? $data->total_kilometer_per_week : 'null' !!} });
    @endforeach

    // Get the canvas element
    var ctx = document.getElementById('myLineChart').getContext('2d');

    // Create the line chart
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: weeks,
            datasets: [
                {
                    label: 'Delivery',
                    data: deliveryData.map(function(data) {
                        return data.value;
                    }),

                    fill: true,
                    borderColor: 'rgba(255, 205, 86, 1)',
                    borderWidth: 2,
                    backgroundColor: 'rgba(255, 205, 86, 1)', // Adjust the alpha value as needed
                },
                {
                    label: 'Inbound',
                    data: inboundData.map(function(data) {
                        return data.value;
                    }),
                    fill: true,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    backgroundColor: 'rgba(75, 192, 192, 1)', // Adjust the alpha value as needed
                },
                {
                    label: 'Outbound',
                    data: outboundData.map(function(data) {
                        return data.value;
                    }),
                    fill: true,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    backgroundColor: 'rgba(255, 99, 132, 1)', // Adjust the alpha value as needed
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var dataIndex = context.dataIndex;
                            return `Week: ${weeks[dataIndex]}, Date Range: ${dateRanges[dataIndex]}, Total Kilometers: ${context.raw}`;
                        }
                    }
                }
            }
        }
    });
</script>

<script>
    var datesGasoline1 = {!! json_encode($datesGasoline1) !!};
    var totalPembelianGasoline1 = {!! json_encode($totalPembelianGasoline1) !!};

    var datesGasoline2 = {!! json_encode($datesGasoline2) !!};
    var totalPembelianGasoline2 = {!! json_encode($totalPembelianGasoline2) !!};

    var ctx = document.getElementById('grafikbensin').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: datesGasoline1, // Menggunakan salah satu set tanggal sebagai referensi
                datasets: [{
                    label: 'Pertalite',
                    data: totalPembelianGasoline1,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill : true,

                }, {
                    label: 'Solar',
                    data: totalPembelianGasoline2,
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill : true,

                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
                // Menetapkan tipe dan mobil pertama sebagai nilai default
                var defaultTypeId = {{ $vehiclestype->first()->type_vehicles->id }};
                var defaultCarId = {{ $vehicles->first()->id }};

                // Inisialisasi dropdown tipe dan mobil dengan nilai default
                document.getElementById('carDropdownType2').value = defaultTypeId;

                var vehicleDropdown = document.getElementById('carDropdown');
                Array.from(vehicleDropdown.options).forEach(option => {
                    option.style.display = (option.getAttribute('data-type') == defaultTypeId || defaultTypeId === '') ? 'block' : 'none';
                });
                document.getElementById('carDropdown').value = defaultCarId;

                // Inisialisasi grafik dengan nilai default
                updateChart(defaultCarId);

                // Tambahkan event listener untuk perubahan dropdown tipe
                document.getElementById('carDropdownType2').addEventListener('change', function () {
                    // Memperoleh tipe yang dipilih
                    var selectedTypeId = this.value;

                    // Memfilter opsi nomor plat berdasarkan tipe yang dipilih
                    Array.from(vehicleDropdown.options).forEach(option => {
                        option.style.display = (option.getAttribute('data-type') == selectedTypeId || selectedTypeId === '') ? 'block' : 'none';
                    });

                    // Memilih mobil pertama yang sesuai dengan tipe yang dipilih
                    var firstMatchingCarId = vehicleDropdown.querySelector('option[data-type="' + selectedTypeId + '"]').value;

                    // Memperbarui grafik berdasarkan mobil pertama yang sesuai dengan tipe yang dipilih
                    updateChart(firstMatchingCarId);
                });

                // Tambahkan event listener untuk perubahan dropdown nomor plat
                document.getElementById('carDropdown').addEventListener('change', function () {
                    var selectedCarId = this.value;
                    updateChart(selectedCarId);
                });
            });

            function updateChart(carId) {
                // Ajax request untuk mendapatkan data grafik
                fetch('{{ route("chartbensin", ["carId" => "_carId_"]) }}'.replace('_carId_', carId))
                    .then(response => response.json())
                    .then(data => {
                        // Hapus grafik lama jika ada
                        var oldChart = Chart.getChart("gasolineMobil");
                        if (oldChart) {
                            oldChart.destroy();
                        }

                        // Buat grafik baru dengan data yang diterima
                        var ctx = document.getElementById('gasolineMobil').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    fill: false,
                                    label: 'Jumlah Pembelian',
                                    data: data.data,
                                    backgroundColor: 'rgba(123, 86, 255, 0.8)', // Warna ungu dengan kejernihan 0.5
                                    borderColor: 'rgba(123, 86, 255, 1)',
                                    borderWidth: 4
                                }]
                            }
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
                // Menetapkan mobil pertama sebagai nilai default
                var defaultCarId = {{ $vehicles->first()->id }};
                var defaultTypeId = {{ $vehicles->first()->type_vehicles->id }};

                // Inisialisasi dropdown tipe dan nomor plat dengan nilai default
                document.getElementById('carDropdownType').value = defaultTypeId;

                var vehicleDropdown = document.getElementById('carDropdownRatio');
                Array.from(vehicleDropdown.options).forEach(option => {
                    option.style.display = (option.getAttribute('data-type') == defaultTypeId || defaultTypeId === '') ? 'block' : 'none';
                });
                document.getElementById('carDropdownRatio').value = defaultCarId;

                // Inisialisasi grafik dengan nilai default
                updateChartRatio(defaultCarId);

                // Tambahkan event listener untuk perubahan dropdown tipe
                document.getElementById('carDropdownType').addEventListener('change', function () {
                    // Memperoleh tipe yang dipilih
                    var selectedTypeId = this.value;

                    // Memfilter opsi nomor plat berdasarkan tipe yang dipilih
                    Array.from(vehicleDropdown.options).forEach(option => {
                        option.style.display = (option.getAttribute('data-type') == selectedTypeId || selectedTypeId === '') ? 'block' : 'none';
                    });

                    // Memilih mobil pertama yang sesuai dengan tipe yang dipilih
                    var firstMatchingCarId = vehicleDropdown.querySelector('option[data-type="' + selectedTypeId + '"]').value;

                    // Memperbarui grafik berdasarkan mobil pertama yang sesuai dengan tipe yang dipilih
                    updateChartRatio(firstMatchingCarId);
                });

                // Tambahkan event listener untuk perubahan dropdown nomor plat
                document.getElementById('carDropdownRatio').addEventListener('change', function () {
                    var selectedCarId = this.value;
                    updateChartRatio(selectedCarId);
                });
            });

            function updateChartRatio(carId) {
                // Ajax request untuk mendapatkan data grafik
                fetch('{{ route("chartratio", ["carId" => "_carId_"]) }}'.replace('_carId_', carId))
                    .then(response => response.json())
                    .then(data => {
                        // Hapus grafik lama jika ada
                        var oldChart = Chart.getChart("ratio");
                        if (oldChart) {
                            oldChart.destroy();
                        }

                        // Buat grafik baru dengan data yang diterima
                        var ctx = document.getElementById('ratio').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    fill: false,
                                    label: 'Ratio',
                                    data: data.data,
                                    borderColor: 'rgba(255, 41, 41, 1)',
                                    borderWidth: 4
                                }]
                            }
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
</script>

@include('layouts.erpFooter')
@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Inbox</h1>
    </div>

    <div class="section-body">
        <div class="row">

            <!-- Ticket Masuk Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-edit"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tiket Masuk</h4>
                        </div>
                        <div class="card-body">
                            {{ $incomingTickets }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accept Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sedang Diproses</h4>
                        </div>
                        <div class="card-body">
                            {{ $accepted }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- On Hold Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-pause"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tiket Ditahan</h4>
                        </div>
                        <div class="card-body">
                            {{ $onHold }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Close Card -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tiket Ditutup</h4>
                        </div>
                        <div class="card-body">
                            {{ $closed }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-2">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Filters</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-danger" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse" style="">
                        <div class="card-body">
                            <!-- Add checkboxes to enable/disable filters -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="enableCategoryFilter">
                                <label class="form-check-label" for="enableCategoryFilter">Enable Category
                                    Filter</label>
                            </div>

                            <label for="categoryFilter">Category:</label>
                            <select id="categoryFilter" class="form-control" disabled>
                                @foreach ($priority as $p)
                                <option value="{{ $p->id }}">{{ $p->priority_type }}</option>
                                @endforeach
                            </select>
                            <!-- Add checkboxes to enable/disable filters -->
                            <div class="mt-2 form-check">
                                <input type="checkbox" class="form-check-input" id="enableStatusFilter">
                                <label class="form-check-label" for="enableStatusFilter">Enable Status
                                    Filter</label>
                            </div>

                            <label for="statusFilter">Status</label>
                            <select id="statusFilter" class="form-control" disabled>
                                @foreach ($status as $s)
                                <option value="{{ $s->id }}">{{ $s->ticket_status }}</option>
                                @endforeach
                            </select>

                            <div class="mt-2 form-check">
                                <input type="checkbox" class="form-check-input" id="enableDateFilter">
                                <label class="form-check-label" for="enableDateFilter">Enable Date Range
                                    Filter</label>
                            </div>

                            <input type="text" class="form-control" id="dateRange" name="dateRange" disabled />
                            <label for="dateRange">Date Range:</label>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Select Date Range
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" id="btnToday">Today</a>
                                    <a class="dropdown-item" href="#" id="btnYesterday">Yesterday</a>
                                    <a class="dropdown-item" href="#" id="btnLast7Days">Last 7 Days</a>
                                    <a class="dropdown-item" href="#" id="btnLast30Days">Last 30 Days</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" id="btnThisMonth">This Month</a>
                                    <a class="dropdown-item" href="#" id="btnLastMonth">Last Month</a>
                                </div>
                            </div>

                            <button id="applyFilterBtn" class="mt-2 btn btn-primary">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-10">
                <div class="card">
                    <div class=" card-body">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table id="ticketHistory" class="table table-striped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Dari</th>
                                        <th>Subject</th>
                                        <th>Priority</th>
                                        <th>Due Date</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
    var test = $('#ticketHistory').DataTable({
        pageLength: 6,
        processing: true,
        serverSide: true,
        responsive: true,
        order: [[5, "desc"]],
        dom: 'Bfrtip',
        fixedColumns: {
            heightMatch: 'none'
        },
        buttons: [{
                extend: 'collection', // Use the 'collection' option for dropdown
                text: '<i class="far fa-file"></i> Export',
                className: 'btn btn-primary',
                init: function(dt, node, config) {
                    $(node).removeClass('dt-button'); // Remove default DataTables button class
                },
                buttons: [{
                        extend: 'csv',
                        text: '<i class="far fa-file-excel"></i> CSV',
                        className: 'btn btn-icon icon-left btn-primary',
                        init: function(dt, node, config) {
                            $(node).removeClass('dt-button'); // Remove default DataTables button class
                        },
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="far fa-file-pdf"></i> PDF',
                        className: 'btn btn-icon icon-left btn-danger',
                        init: function(dt, node, config) {
                            $(node).removeClass('dt-button'); // Remove default DataTables button class
                        },
                    },
                    {
                        extend: 'excel',
                        text: '<i class="far fa-file-excel"></i> Excel',
                        className: 'btn btn-icon icon-left btn-success',
                        init: function(dt, node, config) {
                            $(node).removeClass('dt-button'); // Remove default DataTables button class
                        },
                    },
                ]
            },
            {
                extend: 'colvis',
                text: 'Column Visibility',
                className: 'btn btn-warning',
                init: function(dt, node, config) {
                    $(node).removeClass('dt-button'); // Remove default DataTables button class
                },
            },
            {
                extend: 'pageLength',
                text: 'Page Length',
                className: 'btn btn-info',
                init: function(dt, node, config) {
                    $(node).removeClass('dt-button'); // Remove default DataTables button class
                },
            },
        ],
        columns: [{
                data: 'sequence',
                name: 'sequence',
                orderable: true
            },
            {
                data: 'owner_id',
                name: 'owner_id'
            },
            {
                data: 'subject',
                name: 'subject',
                orderable: true
            },
            {
                data: 'priority_type',
                name: 'priority_type',
                orderable: true,
                render: function(data, type, row) {
                    return $('<div>').html(data).text(); // Use jQuery to parse and unescape HTML
                }
            },
            {
                data: 'due_date',
                name: 'due_date',
                orderable: true
            },
            {
                data: 'created_at',
                name: 'created_at',
                orderable: true
            },
            {
                data: 'ticket_status',
                name: 'ticket_status',
                orderable: true,
                render: function(data, type, row) {
                                return $('<div>').html(data).text(); // Use jQuery to parse and unescape HTML
                }
            },
            {
                data: 'button',
                name: 'button',
                render: function(data, type, row) {
                    return $('<div>').html(data).text(); // Use jQuery to parse and unescape HTML
                }
            }
        ],
        ajax: {
            url: '{{ route("ticket.ajax") }}',
            type: 'GET',
            data: function(d) {
                // Add filter parameters to the AJAX request if the checkbox is checked
                if ($('#enableCategoryFilter').is(':checked')) {
                    d.categoryFilter = $('#categoryFilter').val();
                }

                if ($('#enableStatusFilter').is(':checked')) {
                    d.statusFilter = $('#statusFilter').val();
                }
                // Add date range filter
                if ($('#enableDateFilter').is(':checked')) {
                    var dateRange = $('#dateRange').val();
                    if (dateRange) {
                        var dateRangeArray = dateRange.split(' - ');
                        d.dateRangeFilterStart = moment(dateRangeArray[0], 'YYYY-MM-DD').format('YYYY-MM-DD');
                        d.dateRangeFilterEnd = moment(dateRangeArray[1], 'YYYY-MM-DD').format('YYYY-MM-DD');
                    }
                }
            }
        }
    });

    // Initialize date range picker
    $('#dateRange').daterangepicker({
        opens: 'right',
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'YYYY-MM-DD',
        }
    });

    // Event handler for the dropdown items
    $('.dropdown-item').on('click', function() {
        var rangeId = $(this).attr('id');

        // Call the appropriate function based on the selected item
        if (rangeId === 'btnToday') {
            setToday();
        } else if (rangeId === 'btnYesterday') {
            setYesterday();
        } else if (rangeId === 'btnLast7Days') {
            setLast7Days();
        } else if (rangeId === 'btnLast30Days') {
            setLast30Days();
        } else if (rangeId === 'btnThisMonth') {
            setThisMonth();
        } else if (rangeId === 'btnLastMonth') {
            setLastMonth();
        }

        test.ajax.reload(); // Reload DataTable
    });

    function setToday() {
        var startDate = moment().format('YYYY-MM-DD');
        $('#dateRange').val(startDate + ' - ' + startDate);
    }
                    function setYesterday() {
                        var startDate = moment().subtract(1, 'day').format('YYYY-MM-DD');
                        $('#dateRange').val(startDate + ' - ' + startDate);
                    }

                    function setLast7Days() {
                        var startDate = moment().subtract(6, 'days').format('YYYY-MM-DD');
                        var endDate = moment().format('YYYY-MM-DD');
                        $('#dateRange').val(startDate + ' - ' + endDate);
                    }

                    function setLast30Days() {
                        var startDate = moment().subtract(29, 'days').format('YYYY-MM-DD');
                        var endDate = moment().format('YYYY-MM-DD');
                        $('#dateRange').val(startDate + ' - ' + endDate);
                    }

                    function setThisMonth() {
                        var startDate = moment().startOf('month').format('YYYY-MM-DD');
                        var endDate = moment().endOf('month').format('YYYY-MM-DD');
                        $('#dateRange').val(startDate + ' - ' + endDate);
                    }

                    function setLastMonth() {
                        var startDate = moment().subtract(1, 'month').startOf('month').format('YYYY-MM-DD');
                        var endDate = moment().subtract(1, 'month').endOf('month').format('YYYY-MM-DD');
                        $('#dateRange').val(startDate + ' - ' + endDate);
                    }

                $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
                    // Adjust the format based on your actual needs
                    var startDate = picker.startDate.format('YYYY-MM-DD');
                    var endDate = picker.endDate.format('YYYY-MM-DD');
                    $(this).val(startDate + ' - ' + endDate);
                    test.ajax.reload(); // Reload DataTable
                });

                // Clear the input field when the "Clear" button is clicked
                $('#dateRange').on('cancel.daterangepicker', function() {
                    $(this).val('');
                    test.ajax.reload(); // Reload DataTable
                });



            // Apply Filter Button Click Event
            $('#applyFilterBtn').on('click', function() {
                // Reload DataTable with new filter values
                test.ajax.reload();
            });

            // Toggle filter select elements based on checkbox status
            $('#enableCategoryFilter').change(function() {
                $('#categoryFilter').prop('disabled', !this.checked);
            });


            $('#enableStatusFilter').change(function() {
                $('#statusFilter').prop('disabled', !this.checked);
            });

            $('#enableDateFilter').change(function() {
                $('#dateRange').prop('disabled', !this.checked).val('');
            });
        });
</script>
@include('layouts.erpFooter')
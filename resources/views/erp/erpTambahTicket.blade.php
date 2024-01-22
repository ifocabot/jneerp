@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>Ticket</h1>
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
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Tambah Ticket</h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-danger" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse" style="">
                        <div class="card-body">
                            <form method="POST" action="{{ route('ticket.post') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Subject -->
                                        <div class="form-group">
                                            <label for="subject">{{ __('Subject') }}</label>
                                            <input type="text" id="subject" name="subject" class="form-control"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="target_id">{{ __('Assignee') }}</label>
                                            <select name="target_id" class="form-control select2" id="assignee_id"
                                                required>
                                                @foreach ($akun as $u)
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- CC Users -->
                                        <div class="form-group">
                                            <label for="cc">{{ __('CC Users') }}</label>
                                            <select id="cc" name="cc[]" class="form-control select2"
                                                multiple="multiple">
                                                @foreach ($akun as $u )
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Department -->
                                        <div class="form-group">
                                            <label for="department_id">{{ __('Department') }}</label>
                                            <select id="department_id" name="department_id" class="form-control"
                                                required>
                                                @foreach ($departments as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->nama_departemen }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <!-- Priority -->
                                        <div class="form-group">
                                            <label for="priority">{{ __('Priority') }}</label>
                                            <select id="priority" name="priority_id" class="form-control" required>
                                                @foreach ($priority as $prio )
                                                <option value="{{ $prio->id }}">{{ $prio->priority_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select id="status" name="ticket_status_id" class="form-control" required>
                                                @foreach ($status as $s )

                                                <option value="{{ $s->id }}">{{ $s->ticket_status }}</option>

                                                @endforeach
                                                <!-- Tambahkan opsi status lain sesuai kebutuhan -->
                                            </select>
                                        </div>

                                        <!-- Help Topic -->
                                        <div class="form-group">
                                            <label for="help_topic_id">{{ __('Help Topic') }}</label>
                                            <select id="help_topic_id" name="help_topic_id" class="form-control"
                                                required>
                                                @foreach ($help_topic as $help)
                                                <option value="{{ $help->id }}">{{ $help->nama_topik }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="Type">{{ __('Type') }}</label>
                                            <select id="type" name="type_id" class="form-control" required>
                                                @foreach ($type as $t )
                                                <option value="{{ $t->id }}">{{ $t->tipe_ticket }}</option>
                                                @endforeach
                                                <!-- Tambahkan opsi status lain sesuai kebutuhan -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea id="description" name="description" class="form-control" rows="4"
                                                required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="dateRange">{{ __('Due Date') }}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker" name="due_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-primary">
                        <h4>Outgoing Ticket</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table id="ticketHistory" class="table table-striped dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Tujuan</th>
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
        serverSide: false,
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
                data: 'target_id',
                name: 'target_id',
                orderable: true
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
            url: '{{ route("ticket.out.ajax") }}',
            type: 'GET',
        }
    });
});
</script>
<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            autoclose: true
        });
    });
</script>

@include('layouts.erpFooter')

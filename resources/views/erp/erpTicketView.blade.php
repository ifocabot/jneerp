@include('layouts.erpNavigation')

<section class="section">
    <div class="section-header">
        <h1>{{ $ticket->tix_code }} : {{ $ticket->helpTopic->nama_topik }}</h1>
    </div>
    <div class="section-body">
        <div class="mb-3 row">
            <div class="col-12">
                <div class="mb-0 card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('ticket.accept', ['id'=> $ticket->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="mr-2 btn btn-success btn-lg" {{ $ticket->ticket_status_id == 2 ||
                                    $ticket->ticket_status_id == 5 ||
                                    $ticket->ticket_status_id == 3 ? 'disabled' : '' }}>
                                    <i class="fas fa-check"></i> Accepted
                                </button>
                            </form>

                            <form action="{{ route('ticket.hold', ['id' => $ticket->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="mr-2 btn btn-dark btn-lg" {{ $ticket->ticket_status_id == 5 ||
                                    $ticket->ticket_status_id == 3 ?
                                    'disabled' : '' }}>
                                    <i class="fas fa-times"></i> Mark As Hold
                                </button>
                            </form>

                            <form action="{{ route('ticket.close', ['id' => $ticket->id]) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="mr-2 btn btn-danger btn-lg" {{ $ticket->ticket_status_id == 3 ?
                                    'disabled' : '' }}>
                                    <i class="fas fa-times"></i> Close Ticket
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tickets">
                            <div class="ticket-content">
                                <div class="ticket-header">
                                    <div class="ticket-sender-picture img-shadow">
                                        <img src="https://www.hitoko.co.id/blog/wp-content/uploads/2022/12/kenali-joni-jne-untuk-bisnis-1-1024x900.jpg"
                                            alt="image">
                                    </div>
                                    <div class="ticket-detail">
                                        <div class="ticket-title">
                                            <h4>{{ $ticket->subject }}</h4>
                                        </div>
                                        <div class="ticket-info">
                                            <div class="font-weight-600">{{ $ticket->user->name }}</div>
                                            <div class="bullet"></div>
                                            <div class="text-primary font-weight-600">
                                                {{\Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    <p>{{ $ticket->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Daftar pesan -->
                        <div>
                            <div class="message">
                                <div class="message-header">
                                    <strong>a</strong>
                                </div>
                                <div class="message-body">
                                    a
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        History
                    </div>
                    <div class="card-body">
                        <div class="activities">
                            @foreach ($history as $h)
                            <div class="activity">
                                <div class="text-white activity-icon bg-primary shadow-primary">
                                    <i class="{{ $h->icon->name }}"></i>
                                </div>
                                <div class="activity-detail">
                                    <div class="mb-2">
                                        <span class="text-job text-primary">{{ $h->user->name }}</span>
                                        <span class="bullet"></span>
                                        <span>{{\Carbon\Carbon::parse($h->created_at)->diffForHumans()}}</span>
                                    </div>
                                    <p>{{ $h->history }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.erpFooter')
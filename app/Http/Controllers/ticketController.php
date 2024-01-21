<?php

namespace App\Http\Controllers;

use App\Models\departments;
use App\Models\helpTopics;
use App\Models\priority;
use App\Models\tickethistory;
use App\Models\tickets;
use App\Models\ticketStatus;
use App\Models\ticketsType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $akun = User::all()->sortBy('name');
        $departments = departments::all();
        $help_topic = helpTopics::all();
        $priority = priority::all();
        $type = ticketsType::all();
        $status = ticketStatus::all();

        return view('erp.erpTambahTicket',compact(
            'akun',
            'departments',
            'help_topic',
            'priority',
            'type',
            'status'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();

        $validatedData = $request->validate([
            'subject' =>'required',
            'target_id' => 'required',
            'cc' => 'nullable|array', // Menjadikan 'cc' opsional
            'priority_id' => 'required',
            'help_topic_id' => 'required',
            'department_id' => 'required',
            'type_id' => 'required',
            'ticket_status_id' => 'required',
            'description' => 'required',
            'due_date' => 'date'
        ]);

        // Periksa apakah 'cc' diset atau tidak sebelum menggabungkan
        $cc_user = isset($validatedData['cc']) ? implode(',', $validatedData['cc']) : '';

        $randomNumber = '#TCKT-' . rand(1000, 9999) . '-' . now()->format('s') . now()->format('i') . now()->format('H');

        $model = new tickets();
        $model->fill($validatedData);
        $model->tix_code = $randomNumber;
        $model->owner_id = $userId;
        $model->cc = $cc_user;
        $model->save();

        $history = new tickethistory();
        $history->user_id = $userId;
        $history->ticket_id = $model->id;
        $history->history = "Telah membuat ticket";
        $history->icon_id = 4;
        $history->save();

        return redirect()->route('ticket.create');
    }


    /**
     * Display the specified resource.
     */
    public function inbox()
    {
        $priority = Priority::all();
        $status = TicketStatus::all();
        $id = auth()->id();

        $tickets = Tickets::where('target_id',$id)->whereIn('ticket_status_id', [1, 2, 5, 3])->get();

        $incomingTickets = $tickets->where('ticket_status_id', 1)->count();
        $accepted = $tickets->where('ticket_status_id', 2)->count();
        $onHold = $tickets->where('ticket_status_id', 5)->count();
        $closed = $tickets->where('ticket_status_id', 3)->count();

        return view('erp.erpTicketInbox', compact('priority', 'status', 'incomingTickets', 'accepted', 'onHold', 'closed'));
    }


    public function ticketAjax(Request $request)
    {
        return $request->ajax()
            ? $this->getDataTicket($request)
            : abort(404);
    }

    private function getDataTicket(Request $request)
    {
        $id = auth()->id();

        // Start with the base query
        $ticketQuery = tickets::where(function($query) use ($id) {
            $query->where('target_id', '=', $id)
                ->orWhereRaw("FIND_IN_SET($id, cc) > 0");
        })
        ->with(['priority', 'status','user'])
        ->orderByDesc('created_at');

        // Apply filters to the query
        if ($request->filled('categoryFilter')) {
            $ticketQuery->where('priority_id', $request->input('categoryFilter'));
        }

        if ($request->filled('statusFilter')) {
            $ticketQuery->where('ticket_status_id', $request->input('statusFilter'));
        }

        if ($request->filled('dateRangeFilterStart') && $request->filled('dateRangeFilterEnd')) {
            $startDate = $request->input('dateRangeFilterStart');
            $endDate = $request->input('dateRangeFilterEnd');

            $ticketQuery->whereBetween('created_at', [Carbon::parse($startDate), Carbon::parse($endDate)]);
        }

        $tickets = $ticketQuery->get();

        return DataTables::of($tickets)
            ->addIndexColumn()
            ->addColumn('sequence', function ($row) {
                return $row->id;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('ticket_status', function ($row) {
                if ($row->status) {
                    $classColor = $row->status->class;
                    $status = $row->status->ticket_status;

                    return '<span class="badge badge-' . $classColor . '">' . $status . '</span>';
                }
            })
            ->addColumn('owner_id', function ($row) {
                return optional($row->user)->name;
            })
            ->addColumn('priority_type', function ($row) {
                if ($row->priority) {
                    $classColor = $row->priority->class_color;
                    $priorityType = $row->priority->priority_type;

                    return '<span class="badge badge-' . $classColor . '">' . $priorityType . '</span>';
                }

                return null;
            })
            ->addColumn('button', function ($row) {
                return '<a href="' . route('ticket.view', ['id' => $row->id]) . '" class="btn btn-outline-dark" target="_blank"><i class="far fa-edit"></i>Open</a>';
            })
            ->make(true);
    }

    public function outgoingTicketAjax(Request $request)
    {
        return $request->ajax()
            ? $this->getDataTicketOutgoing($request)
            : abort(404);
    }

    private function getDataTicketOutgoing(Request $request)
    {
        $id = auth()->id();

        // Start with the base query
        $ticketQuery = tickets::where('owner_id', '=', $id)->with(['priority', 'status','user'])->orderBy('ticket_status_id');

        return DataTables::of($ticketQuery)
            ->addIndexColumn()
            ->addColumn('sequence', function ($row) {
                return $row->id;
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y');
            })
            ->addColumn('ticket_status', function ($row) {
                if ($row->status) {
                    $classColor = $row->status->class;
                    $status = $row->status->ticket_status;

                    return '<span class="badge badge-' . $classColor . '">' . $status . '</span>';
                }
            })
            ->addColumn('target_id', function ($row) {
                return optional($row->targetid)->name;
            })
            ->addColumn('priority_type', function ($row) {
                if ($row->priority) {
                    $classColor = $row->priority->class_color;
                    $priorityType = $row->priority->priority_type;

                    return '<span class="badge badge-' . $classColor . '">' . $priorityType . '</span>';
                }

                return null;
            })
            ->addColumn('button', function ($row) {
                return '<a href="' . route('ticket.view', ['id' => $row->id]) . '" class="btn btn-outline-dark" target="_blank"><i class="far fa-edit"></i>Open</a>';
            })
            ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function viewTicket(string $id)
    {
        $ticket = tickets::with(['priority', 'status', 'user','helpTopic'])->findorfail($id);
        $history = tickethistory::with(['user','icon'])->where('ticket_id',$id)->orderBy('created_at','asc')->get();

        return view('erp.erpTicketView',compact(
            'ticket',
            'history'
        ));
    }


    public function acceptTicket($id)
    {
        $userId = auth()->id();

        $ticket = tickets::findOrFail($id);

        // Lakukan apa pun yang perlu dilakukan saat tombol "Accept" diklik,
        // seperti menyimpan data ke database atau melakukan tindakan lainnya.
        $ticket->is_it_accepted = 1;
        $ticket->assigned_id = $userId;
        $ticket->accepted_at = now(); // Menggunakan fungsi now() untuk mendapatkan waktu saat ini
        $ticket->ticket_status_id = 2;
        $ticket->save();

        $history = new tickethistory();
        $history->user_id = $userId;
        $history->ticket_id = $id;
        $history->history = "Ticket telah di accept";
        $history->icon_id = 1;
        $history->save();

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->route('ticket.view', ['id' => $id])->with('success', 'Ticket accepted successfully.');
    }

    public function holdTicket($id)
    {
        $userId = auth()->id();

        $ticket = tickets::findOrFail($id);

        // Lakukan apa pun yang perlu dilakukan saat tombol "Accept" diklik,
        // seperti menyimpan data ke database atau melakukan tindakan lainnya.
        $ticket->ticket_status_id = 5;
        $ticket->save();

        $history = new tickethistory();
        $history->user_id = $userId;
        $history->ticket_id = $id;
        $history->history = "Tiket saat ini ditahan oleh pengguna, menunggu petunjuk selanjutnya atau sedang melanjutkan ticket yang lebih urgent.";
        $history->icon_id = 3;
        $history->save();

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->route('ticket.view', ['id' => $id]);
    }

    public function closeTicket($id)
    {
        $userId = auth()->id();

        $ticket = tickets::findOrFail($id);

        // Lakukan apa pun yang perlu dilakukan saat tombol "Accept" diklik,
        // seperti menyimpan data ke database atau melakukan tindakan lainnya.
        $ticket->ticket_status_id = 3;
        $ticket->save();

        $history = new tickethistory();
        $history->user_id = $userId;
        $history->ticket_id = $id;
        $history->history = "Tiket sudah di close oleh pengguna";
        $history->icon_id = 2;
        $history->save();

        // Redirect atau kembali ke halaman yang sesuai
        return redirect()->route('ticket.view', ['id' => $id]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

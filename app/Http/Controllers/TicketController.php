<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{
    public function create() {
        alert()->success();

        return back();
    }
    public function destroy(Request $request, Ticket $ticket)
    {
        $ticket->delete();
        alert()->success('Success', 'Successfully Deleted');

        return back();
    }
    public function index() {
        return view('home.tickets');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tickets', [
            'ticketsColumn' => Schema::getColumnListing('tickets'),
            'tickets' => Ticket::latest('created_at')->paginate(7),
        ]);
    }
}

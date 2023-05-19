<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;


class TicketsTable extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.tickets-table', [
            'tickets_columns' => Schema::getColumnListing('tickets'),
            'tickets' => Ticket::all(),
        ]);
    }
}

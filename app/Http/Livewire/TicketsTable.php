<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;


class TicketsTable extends Component
{
    use WithPagination;



    public $ticket;
    public $selectUserID = 0;

    // public function mount(Ticket $ticket)
    // {
    //     $this->ticket = $ticket;
    // }
    public function render()
    {
        return view('livewire.tickets-table', [
            'tickets_columns' => Schema::getColumnListing('tickets'),
            'tickets' => Ticket::all(),
        ]);
    }

    public function changeDelete($ticket){
        $this->selectUserID = $ticket;
    }

    public function delete()
    {
        $ticket = Ticket::findOrfail($this->selectUserID);
        $ticket->delete();

        // $this->dispatchBrowserEvent('refresh-page', ['timeout' => 2000]);

        // Perform the delete operation using the ticket ID

        // alert()->success('Success', 'You deleted the ticket successfully');
    }
}

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
    public string $description = '';
    public string $title = '';
    public string $priority = '';
    public $user_id;
    public $selectTicketID = 0;
    public $selectUserID = 0;

    // public function mount(Ticket $ticket)
    // {
    //     $this->ticket = $ticket;
    // }

    protected $rules = [
        'title' => ['required' , 'min:5'],
        'description' => ['required'],
        'priority' => ['required'],
    ];
    public function render()
    {
        return view('livewire.tickets-table', [
            'tickets_columns' => Schema::getColumnListing('tickets'),
            'tickets' => Ticket::latest('created_at')->get(),
        ]);
    }

    public function changeDelete($ticket){
        $this->selectTicketID = $ticket;
    }
    public function changeUpdate($ticket, $user_id) {
        $this->selectTicketID = $ticket;
        $this->selectUserID = $user_id;
    }

    public function delete()
    {
        $ticket = Ticket::findOrfail($this->selectTicketID);
        $ticket->delete();


    }
    public function update()
    {
        $ticket = Ticket::findOrfail($this->selectTicketID);
        $this->validate();

        $ticket->update([
            'user_id' => $this->selectUserID,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
        ]);

        session()->flash('message', 'Ticket Successfully updated.');

    }
    public function updated($property) {
        $this->validateOnly($property);
    }
}

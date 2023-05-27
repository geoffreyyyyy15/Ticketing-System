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
    public string $title1;
    public $user_id;
    public $selectTicketID = 0;
    public $selectUserID = 0;

    // public function mount(Ticket $ticket)
    // {
    //     $this->ticket = $ticket;
    // }
    
    public function render()
    {
        return view('livewire.tickets-table', [
            'tickets_columns' => Schema::getColumnListing('tickets'),
            'tickets' => Ticket::latest('created_at')->paginate(5),
        ]);
    }
    protected $rules = [
        'title' => ['required'],
        'description' => ['required'],
        'priority' => ['required'],
    ];

    public function changeDelete($ticket){
        $this->selectTicketID = $ticket;
    }
    public function changeUpdate($ticket, $user_id) {
        $this->selectTicketID = $ticket;
        $this->selectUserID = $user_id;

        function ticketValue($id, $ticketColumn) {
            return Ticket::all()->where('id', $id)->pluck($ticketColumn)->first();
        }

        $this->title = ticketValue($ticket, 'title');    
        $this->priority = ticketValue($ticket, 'priority');    
        $this->description = ticketValue($ticket, 'description');    
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

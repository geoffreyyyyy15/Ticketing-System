<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class DeleteTicket extends Component
{
    public $ticket;
    public $selectUserID = 0;

    public function mount($ticket)
    {
        $this->ticket = $ticket;
    }

    public function delete()
    {
        if($this->selectUserID == 0) {
            return;
        }
        $ticket = Ticket::findOrfail($this->selectUserID);
        $ticket->delete();
        $this->selectUserID = 0;
        // $this->dispatchBrowserEvent('refresh-page', ['timeout' => 2000]);

        // Perform the delete operation using the ticket ID

        // alert()->success('Success', 'You deleted the ticket successfully');
    }


    public function render()
    {
        return view('livewire.delete-ticket');
    }

    public function deleteTicket()
    {
        $this->delete();
    }
    public function changeDelete($ticket){
        $this->selectUserID = $ticket;
    }
}

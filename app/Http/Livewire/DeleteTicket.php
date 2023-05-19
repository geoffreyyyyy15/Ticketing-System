<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class DeleteTicket extends Component
{
    public $ticketId;

    public function mount($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function delete()
    {
        Ticket::destroy($this->ticketId);

        $this->dispatchBrowserEvent('refresh-page', ['timeout' => 2000]);

        // Perform the delete operation using the ticket ID

        // alert()->success('Success', 'You deleted the ticket successfully');
    }

    public function render()
    {
        return view('livewire.delete-ticket');
    }
}

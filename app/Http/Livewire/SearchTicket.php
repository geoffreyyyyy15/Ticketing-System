<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use PharIo\Manifest\Url;

class SearchTicket extends Component
{
    #[Url]
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.search-ticket', [
            'tickets' => Ticket::where('title', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}

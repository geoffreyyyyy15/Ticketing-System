<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class AddTicket extends Component
{
    public string $title = '';
    public string $description = '';
    public string $priority = '';



    protected $rules = [
        'title' => ['required' , 'min:5'],
        'description' => ['required'],
        'priority' => ['required'],
    ];

    public function add() {

        $credentials = $this->validate();

        $credentials['user_id'] = auth()->id();

        Ticket::updateOrCreate($credentials);

        session()->flash('message', 'Ticket Posted Successfully');


        // Reset the form fields
        $this->title = '';
        $this->description = '';
        $this->priority = '';
        


        return;

    }
    public function updated($property) {
        $this->validateOnly($property);
    }
    public function render()
    {
        return view('livewire.add-ticket');
    }
}

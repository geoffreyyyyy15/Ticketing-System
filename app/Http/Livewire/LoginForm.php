<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class LoginForm extends Component
{

    public string $email = '';
    public string $password = '';

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required']
    ];

    public function render()
    {
        return view('livewire.login-form');
    }

    public function login()
    {
       $credentials = $this->validate();

        // Login User
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            alert()->success('Success', 'You are logged in!');
            return redirect()->route('home')->with('tickets', Ticket::all());
        }
        alert()->error('Failed', 'Invalid Credentials');

        return redirect()->route('login');
    }
}

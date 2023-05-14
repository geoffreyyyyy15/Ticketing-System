<?php

namespace App\Http\Livewire;

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Auth;
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
            return redirect()->route('home');
        }
        session()->flash('message', 'Your credentials were invalid');

        return redirect()->route('login');
    }
}

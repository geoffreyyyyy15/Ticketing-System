<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class LoginForm extends Component
{

    public string $email = '';
    public string $password = '';

    protected $rules = [
        'email' => ['required', 'email', 'exists:users,email'],
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
            Alert::error('Failed', 'Your credentials are invalid. Please try again.');
    }
}

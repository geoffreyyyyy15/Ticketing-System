<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $name = '';
    public string $password_confirmation = '';
    public $image;

    protected $rules = [
        'email' => ['required', 'email', 'unique:users,email'],
        'username' => ['required', 'min:2', 'unique:users,username'],
        'name' => ['required', 'min:2'],
        'password' => ['required', 'min:8', 'confirmed'],
        // 'image' => ['required',  'mimes:jpeg,png,jpg,gif,svg'],


    ];
    public function render()
    {
        return view('livewire.register-form');
    }
    public function submit() {
        $credentials =  $this->validate();


        $credentials['user_type'] = 1;
        $credentials['image'] = request()->file('image')->store('image');
        User::create($credentials);

        return redirect()->route('login');
    }

    public function login() {
        return redirect()->route('login');
    }

    public function updated($property) {
        $this->validateOnly($property);
    }
}

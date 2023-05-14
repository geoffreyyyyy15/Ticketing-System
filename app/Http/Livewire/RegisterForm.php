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
    ];
    public function render()
    {
        return view('livewire.register-form');
    }
    public function submit() {
        $credentials =  $this->validate();


      // Register User
      if ($this->image) {
        $credentials['image'] = $this->image->store('image');
    }
        $credentials['user_type'] = 1;
        User::create($credentials);
    }
}

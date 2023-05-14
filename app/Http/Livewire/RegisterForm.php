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
        'image' => ['required', 'array', 'min:1', 'max:3', 'mimes:jpeg,png,jpg,gif,svg', 'each' => 'image'],


    ];
    public function render()
    {
        return view('livewire.register-form');
    }
    public function submit() {
        $credentials =  $this->validate();
    
        // Register User
        if (is_array($this->image)) {
            foreach ($this->image as $file) {
                $path = $file->store('image');
            }
        } else {
            $path = $this->image->store('image');
        }
    
        $credentials['user_type'] = 1;
        $credentials['image'] = $path;
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

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterForm extends Component
{
    use WithFileUploads;
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $name = '';
    public string $password_confirmation = '';
    public $images = [];

    protected $rules = [
        'email' => ['required', 'email', 'unique:users,email'],
        'username' => ['required', 'min:2', 'unique:users,username'],
        'name' => ['required', 'min:2'],
        'password' => ['required', 'min:8', 'confirmed'],
        'images.*' => ['required', 'max:1024'], // Validate each image separatelys


    ];
    public function render()
    {
        return view('livewire.register-form');
    }
    public function submit() {
        $credentials = $this->validate();

        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('images');
        }

        $credentials['images'] = $imagePaths;

        User::create($credentials);


        alert()->success('Success', 'You Registered Successfully');
        return redirect()->route('login');
    }



    public function updated($property) {
        $this->validateOnly($property);
    }
}

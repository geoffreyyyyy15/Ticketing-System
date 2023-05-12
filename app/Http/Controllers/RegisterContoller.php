<?php

namespace App\Http\Controllers;

use App\Http\Livewire\RegisterForm;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterContoller extends Controller
{
    public function show()
    {
        return view('register.create');
    }

    public function store(RegisterForm $credentials)
    {
        $credentials['image'] = request()->file('image')->store('public');
        $credentials['user_type'] = 1;
        User::create($credentials);
    }
}

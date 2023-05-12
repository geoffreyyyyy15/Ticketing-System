<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.index');
    }

    public function index() {
        return view('home.index');
    }
    public function destroy() {
        auth()->logout();


        alert()->success('Successful', 'Logout Successful!');
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{
    public function create() {
        alert()->success();

        return back();
    }
}

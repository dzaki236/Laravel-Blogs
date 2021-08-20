<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WritterController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }
    public function index()
    {
        # code...
        return view('dashboard.writters.index');
    }
}

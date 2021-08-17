<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function edit_profile($id)
    {
        # code...
        return view('users.edit_profile',['user'=>User::findOrfail($id)]);
    }
}

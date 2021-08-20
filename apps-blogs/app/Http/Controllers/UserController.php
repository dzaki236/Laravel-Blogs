<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function change_role(Request $request,$id)
    {
        # code...
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        Auth::logout();
        return redirect('/login')->with('success','Sekarang anda bisa menulis postingan pada blog ini :)');
    }
}

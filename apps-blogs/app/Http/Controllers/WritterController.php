<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard.writters.index',['post_count'=>Post::where('id_user','=',Auth::user()->id)->count()]);
    }
    public function post($id)
    {
        # code...
        return view('dashboard.writters.index',['post_count'=>Post::where('id','=',$id)->where('id_user','=',Auth::user()->id)->get()]);
    }
}

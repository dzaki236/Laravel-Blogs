<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request);
        if ($request->search) {
            return view('main.index', ['post' => Post::where('title', 'like', '%' . $request->search . '%')->get()]);
        } else {
            return view('main.index', ['post' => Post::where('archive', '=', 'false')->get()]);
        }
    }
}

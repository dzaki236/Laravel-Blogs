<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post()
    {
        # code... 'post'=>Post::where('title','=',$title)->first(),
        return view('dashboard.writters.posts',['post'=>Post::where('id_user','=',Auth::user()->id)->get()]);
    }
    public function detail_post($id)
    {
        # code... 'post'=>Post::where('title','=',$title)->first(),
        return view('dashboard.writters.detail-post',['post'=>Post::where('id','=',$id)->where('id_user','=',Auth::user()->id)->first()]);
    }
}

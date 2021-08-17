<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function comment(Request $request)
    {
        # code...
        $this->validate($request,[
            'comments'=>'required'
        ]);
        Comment::create([
            'user'=>$request->id_user,
            'id_post'=>$request->id_post,
            'comments'=>$request->comments
        ]);
        return redirect()->back();
    }
    public function delete_comment($id)
    {
        # code...
            $post = Comment::find($id); 
            $post->delete();
            return redirect()->back()->with('success','Komentar telah dihapus');
        }
}

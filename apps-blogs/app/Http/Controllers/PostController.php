<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post()
    {
        # code... 'post'=>Post::where('title','=',$title)->first(),
        return view('dashboard.writters.posts',['post2'=>Post::where('id_user','=',Auth::user()->id)->paginate(10),'post'=>Post::onlyTrashed()->where('id_user','=',Auth::user()->id)->paginate(10)]);
    }
    public function detail_post($id)
    {
        # code... 'post'=>Post::where('title','=',$title)->first(),
        return view('dashboard.writters.detail-post',['post'=>Post::where('id','=',$id)->where('id_user','=',Auth::user()->id)->first()]);
    }

    public function add_post()
    {
        # code...
        return view('dashboard.writters.add-post',['categories'=>Category::all()]);
    }
    public function post_store(Request $request)
    {
        # code...
        $request->validate([
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'content'   => 'required',
            'category' => 'required'
        ]);
        // dd($request->all());
        $foto = $request->file('image');
        $foto->storeAs('public/img/post',$foto->hashName());
        $post = Post::create([
            'image'=>$foto->hashName(),
            'title'=>$request->title,
            'content'=>$request->content,
            'id_user'=>$request->user_id,
            'id_categories'=>$request->category
        ]);
        if($post){
            return redirect()->route('post_dashboard')->with(['message'=>'Data berhasil di tambahkan']);
        }else{
            return redirect()->route('post_dashboard')->with('error','Data gagal di tambahkan');
        }
        // return view('dashboard.writters.add-post');
    }
    public function post_edit($post)
    {
        # code...
        return view('dashboard.writters.edit-post',['categories'=>Category::all(),'post'=>Post::find($post)]);
    }
    public function post_update(Request $request,$id)
    {
        # code...
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
            'category' => 'required'  
        ]);
        $post = Post::findOrFail($id);
        if($request->file('image')==''){
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'id_categories' =>$request->category
            ]);
        }
        else{
             //hapus old image
        Storage::disk('local')->delete('public/img/post/'.$post->image);

        //upload new image
        $foto = $request->file('image');
        $foto->storeAs('public/img/post/', $foto->hashName());

        $post->update([
            'image'     => $foto->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
            'id_categories' =>$request->category
        ]);
        }
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('post_dashboard')->with(['message' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('post_dashboard')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
    
    public function unarchive_post($id)
    {
        # code...
        Post::onlyTrashed()->where('id','=',$id)->restore();
        return redirect()->back()->with('message','Post Successfully to unarchived!');
    }

    public function archive_post($id)
    {
        # code...
        Post::where('id','=',$id)->delete();
        return redirect()->back()->with('message','Post Successfully to archived!');
    }

    public function delete_post($id)
    {
        # code...
        // $post = Post::where('id',$id)->first();
        $post = Post::onlyTrashed()->where('id',$id)->first();
        // dd($post);
        Storage::disk('local')->delete('public/img/post/'.$post->image);
        $post->forceDelete();
        if($post){
            return redirect()->back()->with(['message' => 'Data Berhasil Dihapus!']);
        }
    }

}

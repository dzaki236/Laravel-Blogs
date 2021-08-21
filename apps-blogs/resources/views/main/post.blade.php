@extends('main.layouts.master')
@section('title', $post->title)
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Post</li>
      <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>

    </ol>
  </nav>
    <div class="card">
        <img src="{{ Storage::url('public/img/post/').$post->image }}" class="img-responsive" alt="...">
        <div class="card-body">
            <h1 class="card-title text-dark font-weight-bolder">{{ $post->title }}</h1>
            <hr>
            <p class="card-text w-50 text-secondary" style="overflow: hidden;
                        text-overflow: ellipsis;   white-space: nowrap; ">{!! $post->content !!}</p>
            <div class="row text-center">
                <div class="col-4">{{ $post->created_at->diffForHumans() }}</div>
                <div class="col-4">{{ $post->creator->name }}</div>
                <div class="col-4">{{ $post->category->categories }}</div>
            </div>
        </div>

        <br>
        <hr>
        <br>
        @if (Session::has('success'))
            <div class="alert alert-success m-3">{{ Session::get('success') }}</div>
        @endif
<h2 class="m-3">Komentar</h2>
        @forelse ($comments as $komen)
            <div class="bg-white shadow-sm mb-2 mt-2 p-3 m-3">
                {{ $komen->users->name }}
                <blockquote>
                    <q>
                        {!! $komen->comments !!}
                    </q>
                </blockquote>
                <p>{{ $komen->created_at->diffForHumans() }}</p>
                @if (Auth::check())
                    @if (Auth::user()->id == $komen->users->id)
                        <form action="{{ route('delete-comment', $komen->id) }}" class="form-inline" method="post" onsubmit="return confirm('are u sure to delete comment?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger">Hapus</button>
                        </form>
                    @endif
                @endif

            </div>
        @empty
            <h3 class="text-center">Tidak ada komentar</h3>
        @endforelse
        <br>
        <hr>
        <br>
        @if (Auth::check())

            <form action="{{ route('comment') }}" method="post">
                {{-- {{ csrf_field() }} --}}
                @csrf
                <div class="form-group m-3">
                    {{-- <label for="id_post">Password</label> --}}
                    <input type="text" name="id_post" style="display: none" class="d-none form-control" id="id_post"
                        value="{{ $post->id }}">
                    <input type="text" name="id_user" style="display: none" class="d-none form-control" id="id_user"
                        value="{{ Auth::user()->id }}">

                    <textarea name="comments" id="comment" cols="30" rows="10"></textarea>
                    <button type="submit" class="btn btn-dark btn-block mt-4">Comment Now!</button>
                </div>
            </form>
        @else
            <h4 class="text-center m-5">Harap Login / Register untuk mengaktifkan kolom komentar</h4>
        @endif

    </div>
@endsection

@extends('main.layouts.master')
@section('title', 'LaraBlogs')
@section('content')
    <div class="row">
        @forelse ($post as $post)
            @if ($post->creator->role == 'writters')
                <div class="col-12 col-xl-4 col-lg-3 col-md-6 mb-4">
                    <a href="{{ url($post->title.'-id='.$post->id) }}" class="text-decoration-none">
                        <div class="card">
                            <img src="{{ $post->image }}" class="img-responsive"
                                style="width: 100%;height:15em;object-fit:cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-dark font-weight-bolder">{{ $post->title }}</h5>
                                <p class="card-text w-50 text-secondary" style="overflow: hidden;
                            text-overflow: ellipsis;   white-space: nowrap; ">{{ $post->content }}</p>
                                <div class="row text-center">
                                    <div class="col-6">{{ $post->created_at->diffForHumans() }}</div>
                                    <div class="col-6">{{ $post->creator->name }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @empty
            <table style="width: 100%">
                <tr>
                    <td class="text-center h2 pb-5 pt-2">Not Found Something Here <a href="/">Back To Home</a></td>
                </tr>
            </table>
        @endforelse
    </div>
@endsection

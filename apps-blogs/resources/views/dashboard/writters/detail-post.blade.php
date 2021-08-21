@extends('dashboard.writters.layouts.master')
@section('title', 'LaraBlogs Writters Dashboard')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="{{ route('post_dashboard') }}">Home</a></li>
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
@endsection

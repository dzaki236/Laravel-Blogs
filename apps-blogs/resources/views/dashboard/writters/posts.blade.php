@extends('dashboard.writters.layouts.master')
@section('title', 'LaraBlogs Writters Dashboard')
@section('content')
<div class="row">
    {{@foreach ($post as $post)
    {{ $post->title }}
    @endforeach}}
</div>
@endsection

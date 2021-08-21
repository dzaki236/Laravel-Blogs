@extends('dashboard.writters.layouts.master')
@section('title', 'LaraBlogs Writters Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('post_store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label class="font-weight-bold">GAMBAR</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    <!-- error message untuk title -->
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">JUDUL</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{ old('title') }}" placeholder="Masukkan Judul Blog">

                    <!-- error message untuk title -->
                    @error('title')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Kategori</label>
                    <select class="form-control" name="category">
                        <option value=" " selected disabled>Select categories</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->code_categories.'-|-'.$item->categories }}</option>
                        @endforeach
                      </select>                      
                    <!-- error message untuk category -->
                    @error('category')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">KONTEN</label>
                    <textarea class="form-control" name="content" rows="5" id="contents"
                        placeholder="Masukkan Konten Blog">{{ old('content') }}</textarea>

                    <!-- error message untuk content -->
                    @error('content')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
        </div>
    </div>

@endsection

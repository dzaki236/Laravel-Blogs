@extends('dashboard.writters.layouts.master')
@section('title', 'LaraBlogs Writters Dashboard')
@section('content')
    @if (Session::has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    <div class="container-fluid" style="width: 100%">
        <a href="{{ route('add_post_dashboard') }}" class="btn btn-primary mb-4">[+] Tambah Post</a>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Postingan Aktif
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <h2> Postingan Aktif</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @forelse ($post2 as $active_post)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $active_post->title }}</td>
                                            <td><img src="{{ Storage::url('public/img/post/').$active_post->image }}" alt="" width="200px"></td>
                                            <td>
                                                Active </td>
                                            <td><a href="post-writter={{ $active_post->id }}"
                                                    class="btn m-2 btn-sm btn-dark">See
                                                    Content</a>
                                                <div class="btn-group">
                                                    <button class="btn btn-secondary btn-sm" type="button">
                                                        Action </button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($active_post->deleted_at == null)

                                                            <form action="{{ route('archive_post', $active_post->id) }}"
                                                                method="POST" class="inline-form">
                                                                @csrf
                                                                <button class="btn text-danger">Archives</button>
                                                            </form>
                                                        @else
                                                            {{-- <form action="{{ route('unarchive_post', $active_post->id) }}"
                                                                method="POST" class="inline-form">
                                                                @csrf
                                                                <button type="submit" class="btn text-success">Unarchives</button>
                                                            </form> --}}
                                                            Kosong??
                                                        @endif
                                                        <a href="{{ route('post_edit',$active_post->id) }}" class="btn text-warning">Edit</a>
                                                    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tbody>
                                        <td colspan="5" class="h4 text-center">Data kosong</td>
                                    </tbody>
                                @endforelse
                            </table>
                            <br>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Postingan Terarsipkan </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <h2> Postingan Terarsipkan</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @forelse ($post as $unactive_post)
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $unactive_post->title }}</td>
                                            <td><img src="{{ Storage::url('public/img/post/').$unactive_post->image }}" alt="" width="200px"></td>
                                            <td>
                                                Archive
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    @if ($unactive_post->deleted_at == null)
                                                        Kosong??
                                                        {{-- <form action="" class="inline-form">
                                                            <button class="btn btn-danger">Archives</button>
                                                        </form> --}}
                                                    @else
                                                        <form action="{{ route('unarchive_post', $unactive_post->id) }}"
                                                            method="POST" class="inline-form">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-block btn-success">Unarchives</button>
                                                        </form>
                                                    @endif
                                                    <form action="{{ route('delete_post',$unactive_post->id)}}" method="post" onsubmit="return confirm('hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn mt-3 btn-block btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tbody>
                                        <td colspan="5" class="h4 text-center">Data kosong</td>
                                    </tbody>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{ $post->links() }}
    </div>
@endsection

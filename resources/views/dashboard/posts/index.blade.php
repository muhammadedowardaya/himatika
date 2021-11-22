@extends('dashboard.layouts.main')


@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    {{-- {{ dd($loop) }} --}}
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $post->title }}
                        <td>{{ $post->category->name }}</td>
                        <td>edit</td>
                        <td>hapus</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

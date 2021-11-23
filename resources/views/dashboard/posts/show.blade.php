@extends('dashboard.layouts.main')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card w-100 shadow border-0 mb-sm-5 mt-3">

                    <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                        class="card-img-top img-fluid position-relative" alt="...">

                    <div class="card-header">
                        <div class="d-flex justify-content-lg-between">
                            <a href="/dashboard/posts" class="btn btn-sm btn-success">
                                <span data-feather="arrow-left"></span> Back to All My Posts
                            </a>
                            <div>
                                <a href="" class="btn btn-sm btn-warning text-dark">
                                    <span data-feather="edit"></span> Edit
                                </a>
                                <a href="" class="btn btn-sm btn-danger">
                                    <span data-feather="trash"></span> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <article>
                            <h5 class="card-title my-4">{{ $post->title }}</h5>
                            <p class="card-text" style="text-align: justify">{!! nl2br($post->body) !!}</p>
                            <small>Dibuat pada : {{ $post->created_at->format('Y F d') }}</small>
                        </article>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between mt-3">
                            <a href="/posts" class="link-secondary">Kembali</a>
                            <small style="font-size: 12px"
                                class="mt-1">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

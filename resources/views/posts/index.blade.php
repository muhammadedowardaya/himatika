@extends('layouts.posts.main')

@section('title', 'Himatika | Blog')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col mt-4">
                <h1>{!! $title !!}</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center cari">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <form action="{{ route('posts') }}">
                    <div class="input-group p-2">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search"
                            value="{{ request('search') }}">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('author'))
                            <input type="hidden" name="author" value="{{ request('author') }}">
                        @endif
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <hr class="my-3">
        </div>
        @if (isset($posts[0]) && isset($posts))
            <div class="row mb-2">
                <div class="col">
                    <div class="card gerak mb-3 text-sm-left text-md-center text-lg-center text-xl-center shadow border-0">
                        <div class="kategoriLabel" title="category">
                            <a href="/posts?category={{ $posts[0]->category->slug }}"
                                class="bg-secondary py-2 px-5 text-decoration-none link-light">{{ $posts[0]->category->name }}</a>
                        </div>
                        @if ($posts[0]->image)
                            <div
                                style="background-size:cover;background-position:center;height:300px;background-image:url('{{ asset('storage/images/posts/' . $posts[0]->image) }}')">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/500x300?{{ $posts[0]->category->name }}"
                                class="card-img-top img-fluid position-relative" alt="...">
                        @endif
                        <div class="card-body">
                            <p>By : <a href="/posts?author={{ $posts[0]->author->username }}"
                                    class="link-success text-decoration-none">{{ $posts[0]->author->name }}</a>
                            </p>
                            <h3 class="card-title mb-4">{{ $posts[0]->title }}</h3>
                            <p class="card-text">{{ Str::limit(strip_tags($posts[0]->body), 200) }} <a
                                    href="{{ route('posts.show', $posts[0]->slug) }}">Read More</a></p>
                            <p class="card-text"><small
                                    class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card gerak mb-4 rounded-3 border-0 shadow" style="min-height:450px">
                            <div class="kategoriLabel" title="category">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="bg-secondary py-2 px-5 text-decoration-none link-light">{{ $post->category->name }}</a>
                            </div>

                            @if ($post->image)
                                <div
                                    style="background-size:cover;background-position:center;height:155px;background-image:url('{{ asset('storage/images/posts/' . $post->image) }}')">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                                    class="card-img-top img-fluid position-relative" alt="...">
                            @endif

                            <div class="card-body">
                                <p>By : <a href="/posts?author={{ $post->author->username }}"
                                        class="link-success text-decoration-none">{{ $post->author->name }}</a>
                                </p>
                                <article>
                                    <h3 class="card-title my-3">{{ $post->title }}</h3>
                                    <p class="card-text" style="text-align: justify">
                                        {{ Str::limit(strip_tags($post->body), 120) }}
                                        <a href="{{ route('posts.show', $post->slug) }}">Read More</a>
                                    </p>
                                </article>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <small style="font-size: 12px"
                                        class="mt-1">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <h5>Posts not found</h5>
            </div>
        @endif

    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endSection()

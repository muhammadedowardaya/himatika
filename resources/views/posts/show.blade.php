@extends('layouts.posts.main')

@section('title', 'Himatika | Blog')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-8">
                <div class="card w-100 shadow border-0 mb-sm-5">
                    @if ($post->image)
                        <div
                            style="background-size:cover;background-position:center;height:500px;background-image:url('{{ asset('storage/images/posts/' . $post->image) }}')">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                            class="card-img-top img-fluid position-relative" alt="...">
                    @endif

                    @can('update', $post)
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <a href="/dashboard/posts" class="btn btn-sm btn-success">
                                    <span data-feather="arrow-left"></span> Back to All My Posts
                                </a>
                                <div>
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-sm btn-warning text-dark">
                                        <span data-feather="edit"></span> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm btnHapus" data-slug="{{ $post->slug }}"
                                        data-id="{{ $post->id }}">
                                        <span data-feather="trash" stroke-width="2"></span> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endcan
                    <div class="card-body">
                        <p>By : <a href="/authors/{{ $post->author->username }}"
                                class="link-success text-decoration-none">{{ $post->author->name }}</a>
                        </p>
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
            <div class="col-sm-12 justify-content-center my-sm-3 d-md-none d-lg-none d-xl-none d-xxl-none">
                <h4 style="font-family: LibreBaskerville-Italic;" class="my-4 text-light">Mungkin kamu tertarik untuk
                    membaca artikel
                    berikut : </h4>
            </div>
            <div class="col-md-4">
                @forelse ($posts->skip(2) as $post)
                    <div class="card gerak bawah mb-4 rounded-3 border-0 shadow" style="height:400px">
                        <div class="kategoriLabel">
                            <a href="{{ route('categories.show', $post->category->slug) }}"
                                class="bg-secondary py-2 px-5 text-decoration-none link-light">{{ $post->category->name }}</a>
                        </div>
                        <div style="width:500px;height:300px">
                            @if ($post->image)
                                <div
                                    style="background-size:cover;background-position:center;height:200px;background-image:url('{{ asset('storage/images/posts/' . $post->image) }}')">
                                </div>
                                {{-- <img src="{{ asset('storage/images/posts/' . $post->image) }}" id="gambar"
                                    class="card-img-top rounded-3" alt="..." width="500px" height="300px"> --}}
                            @else
                                <img src="https://source.unsplash.com/500x200?{{ $post->category->name }}" id="gambar"
                                    class="card-img-top rounded-3" alt="...">
                            @endif
                        </div>


                        <div class="card-body">
                            <p style="font-size:12px;">By : <a href="/authors/{{ $post->author->username }}"
                                    class="link-success text-decoration-none">{{ $post->author->name }}</a>
                            </p>

                            <article>
                                <h5 class="card-title mt-3">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($post->body), 100) }}<a
                                        href="{{ route('posts.show', $post->slug) }}">Read More</a></p>
                            </article>
                            <div class="d-flex justify-content-end mt-3">
                                <small style="font-size: 12px"
                                    class="mt-1">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <h5>Tidak ada postingan</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

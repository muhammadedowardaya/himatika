@extends('layouts.posts.main')

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col mt-4 mb-2">
                <h1>{!! $title !!}</h1>
            </div>
            <hr>
        </div>
        <div class="row mt-3">
            @forelse ($categories as $category)
                <div class="col-md-4">
                    <a href="{{ route('categories.show', $category->slug) }}">
                        <div class="card bg-transparent text-white">
                            <img src="https://source.unsplash.com/500x500?{{ $category->name }}"
                                class="card-img img-thumbnail" alt="...">
                            <div class="card-img-overlay d-flex align-items-center" style="opacity: 0.8">
                                <h5 class="card-title flex-fill text-center px-5 py-3 bg-dark fs-3"
                                    style="text-shadow: 2px 1px 2px black;">
                                    {{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    <h5>Tidak ada categories</h5>
                </div>
            @endforelse
        </div>
    </div>
@endsection

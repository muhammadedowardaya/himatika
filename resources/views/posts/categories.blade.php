@extends('layouts.posts.main')

@section('title', 'Himatika | Blog')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col mt-4 mb-2">
                <h1>{!! $title !!}</h1>
            </div>
            <hr>
        </div>
        <div class="row mt-3">
            @forelse ($categories as $item)
                <div class="col-md-4">
                    <a href="{{ route('categories.show', $item->slug) }}">
                        <div class="card bg-transparent text-white">
                            @if ($item->image)
                                <div class="card-img img-thumbnail border-4 border-light"
                                    style="background-size:cover;background-position:center;height:350px;background-image:url('{{ asset('storage/images/categories/' . $item->image) }}')">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x500?{{ $item->name }}"
                                    class="card-img img-thumbnail" alt="...">
                            @endif
                            <div class="card-img-overlay d-flex align-items-center" style="opacity: 0.8">
                                <h5 class="card-title flex-fill text-center px-5 py-3 bg-dark fs-3"
                                    style="text-shadow: 2px 1px 2px black;">
                                    {{ $item->name }}
                                </h5>
                            </div>
                        </div>
                        {{-- <h1>{{ $item->name }}</h1> --}}
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

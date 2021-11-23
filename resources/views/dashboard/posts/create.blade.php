@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="/dashboard/posts" method="POST">
                @csrf
                {{-- ---- --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" required
                        value="{{ old('title') }}" name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" disabled readonly required
                        @error('slug') is-invalid @enderror>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option selected disabled>Choose One</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    {{-- trix editor --}}
                    <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                        value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endsection

@section('script')
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');


        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // mematikan fungsi file pada trix editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection

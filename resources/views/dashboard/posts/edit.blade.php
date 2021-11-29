@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="row mb-3">
        <div class="col-lg-8">
            <form action="{{ route('posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('patch')
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        value="{{ old('title', $post->title) }}" name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option disabled>Choose One</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category_id', $post->category_id)) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label gambar">Post Image</label>
                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/images/posts/' . $post->image) }}"
                            class="img-thumbnail img-fluid img-preview mb-3 col-sm-5 d-block" alt="">
                    @else
                        <img src="" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image"
                        onchange="previewImg()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>

                    <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror"
                        value="{{ old('body', $post->body) }}">
                    <trix-editor input="body"></trix-editor>
                    @error('body')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


@endsection

@section('script')
    <script>
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');
        const trixEditor = document.querySelector('trix-editor');
        const body = document.querySelector('#body');


        // title.addEventListener('change', function() {
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        // });

        // mematikan fungsi file pada trix editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImg() {
            const gambar = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            gambar.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endsection

@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                @endif --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        value="{{ old('title') }}" name="title">
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

        // trixEditor.addEventListener('keydown', function(e) {
        //     console.log('kamu mencet TAB?');
        //     if (e.key == 'Tab') {
        //         e.preventDefault();

        //         var start = trixEditor.selectionStart;
        //         var end = trixEditor.selectionEnd;

        //         // set textarea value to: text before caret + tab + text after caret
        //         body.value = body.value.substring(1, start) + "\t" + body.value.substring(end);

        //         // put caret at right position again
        //         trixEditor.selectionStart = trixEditor.selectionEnd = start + 1;
        //     }
        // });
    </script>
@endsection

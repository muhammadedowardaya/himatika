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
                    <label for="image" class="form-label gambar">Post Image</label>
                    <img src="" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image"
                        onchange="previewImg()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="" class="img-thumbnail img-preview" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div>
                                    <label class="form-label gambar" for="image">Pilih Gambar</label>
                                    <input type="file" class="form-control  @error('image') is-invalid @enderror" id="image"
                                        name="image" onchange="previewImg()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="row mb-3">
                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-sm" id="colFormLabelSm"
                            placeholder="col-form-label-sm">
                    </div>
                </div> --}}
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
        const trixEditor = document.querySelector('trix-editor');
        const body = document.querySelector('#body');


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

        const labelGambar = document.querySelector('.form-label');
    </script>
@endsection

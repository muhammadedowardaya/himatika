@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-4" id="btnCategory" data-bs-toggle="modal"
                    data-bs-target="#categoryModal">
                    Create New Category
                </button>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            {{-- <th scope="col">No</th> --}}
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr id="{{ $category->id }}">
                                {{-- <td scope="row">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td> --}}
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->image == null)
                                        No Image
                                    @else
                                        <img src="{{ asset('storage/images/categories/' . $category->image) }}" alt=""
                                            class="img-fluid img-thumbnail" width="80px">
                                    @endif
                                </td>
                                <td>
                                    <button id="btnEditCategory" class="badge bg-warning border-0"
                                        data-slug="{{ $category->slug }}" data-name="{{ $category->name }}"
                                        data-bs-toggle="modal" data-bs-target="#categoryModal">
                                        <span data-feather="edit" stroke-width="2"></span>
                                    </button>
                                    {{-- <form action="{{ route('categories.destroy', $category->slug) }}" method="category" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0 btnHapus"
                                            data-slug="{{ $category->slug }}">
                                            <span data-feather="trash" stroke-width="2"></span>
                                        </button>
                                    </form> --}}
                                    <a class="badge bg-danger border-0 btnHapus" data-slug="{{ $category->slug }}"
                                        data-id="{{ $category->id }}">
                                        <span data-feather="trash" stroke-width="2"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- {{ $categories->links() }} --}}

    {{-- Modal create new category --}}


    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" id="form">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        {{-- @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @endif --}}
                        <input type="hidden" name="_method" value="post" id="method">
                        <input type="hidden" name="oldImage" value="{{ $category->image ?? '' }}" id="oldImage">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ old('name') }}" name="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label gambar">Post Image</label>
                            <img src="" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                                id="image" onchange="previewImg()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddCategory" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const hapus = document.querySelectorAll('a.btnHapus');
        hapus.forEach(btnHapus => {
            btnHapus.addEventListener('click', (e) => {
                e.preventDefault();

                const id = btnHapus.getAttribute('data-id');
                const slug = btnHapus.getAttribute('data-slug');

                var _token = $('meta[name=csrf-token]').attr('content');

                Swal.fire({
                    title: 'Apa kamu yakin?',
                    text: "Kamu tidak dapat mengembalikan data ini!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, batal!',
                    reverseButtons: true,
                    imageUrl: "{{ asset('sticker/surprised.png') }}",
                    imageWidth: 200,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // const json = {
                        //     "id": id,
                        //     "_token": _token
                        // };
                        $.ajax({
                            type: "delete",
                            url: `{{ url('dashboard/categories/${id}') }}`,
                            data: _token,
                            // dataType: "json",
                            success: function(response) {
                                $("#" + id).remove();
                                Toast_Post.fire({
                                    icon: 'success',
                                    title: 'Kategori berhasil dihapus!'
                                })
                                // console.log(json_encode(response));
                            },
                            error: function(response) {
                                swalWithBootstrapButtons.fire(
                                    'Gagal!',
                                    'Data gagal dihapus.',
                                    'error'
                                )
                                // console.log(response.responseJSON);
                            },
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: 'Dibatalkan!',
                            text: 'Postingan kamu aman.',
                            imageUrl: "{{ asset('sticker/angel.png') }}",
                            imageWidth: 200,
                            imageHeight: 200,
                            imageAlt: 'Custom image'
                        })
                    }
                });
            });
        });

        // tombol tambah kategori modal
        const btnCategory = document.querySelector('#btnCategory');
        // kategori modal
        const categoryModal = document.querySelector('#categoryModal');
        // tombol submit add
        const btnAddCategory = document.querySelector('#btnAddCategory');
        // tombol edit
        const btnEditCategory = document.querySelectorAll('#btnEditCategory');

        btnCategory.addEventListener('click', function() {
            gsap.fromTo(categoryModal, {
                duration: 2,
                ease: "elastic.out(1, 0.3)",
                y: -70
            }, {
                duration: 2,
                ease: "elastic.out(1, 0.3)",
                y: -10
            });
            $('#name').val('');
            $('.img-preview').attr('src', '');
        });

        btnEditCategory.forEach(update => {
            update.addEventListener('click', function() {
                // tambahkan animasi
                gsap.fromTo(categoryModal, {
                    duration: 2,
                    ease: "elastic.out(1, 0.3)",
                    y: -70
                }, {
                    duration: 2,
                    ease: "elastic.out(1, 0.3)",
                    y: -10
                });

                btnAddCategory.innerHTML = 'Update Category';
                document.querySelector('#categoryModalLabel').innerHTML = 'Update Category Name';
                // <meta name="csrf-token" content="{{ csrf_token() }}">
                const name = update.getAttribute('data-name');
                const slug = update.getAttribute('data-slug');

                $('#name').val(name);

                const _token = $('meta[name="csrf-token"]').attr('content');
                $("#method").val("PATCH");
                $("#form").attr('action', `{{ url('dashboard/categories/${slug}') }}`);

                const imgPreview = document.querySelector('.img-preview');

                const json = {
                    "slug": slug
                }

                // ganti gambar
                $.ajax({
                    type: "post",
                    url: `{{ route('categories.getUbah') }}`,
                    data: JSON.stringify(json),
                    dataType: "json",
                    success: function(response) {
                        $('.img-preview').attr('src', response);
                    }
                });

            })
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

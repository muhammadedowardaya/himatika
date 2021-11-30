@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="table-responsive">
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            {{-- <th scope="col">No</th> --}}
                            <th scope="col">Category Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr id="{{ $category->id }}">
                                {{-- <td scope="row">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td> --}}
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-primary">
                                        <span data-feather="eye"></span>
                                    </a>
                                    <a href="{{ route('categories.edit', $category->slug) }}" class="badge bg-warning">
                                        <span data-feather="edit" stroke-width="2"></span>
                                    </a>
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
                            // url: `{{ url('dashboard/categories/${id}') }}`,
                            data: _token,
                            // dataType: "json",
                            success: function(response) {
                                $("#" + id).remove();
                                Toast_Post.fire({
                                    icon: 'success',
                                    title: 'Postingan berhasil dihapus!'
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
    </script>
@endsection

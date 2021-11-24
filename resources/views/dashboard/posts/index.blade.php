@extends('dashboard.layouts.main')


@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr id="{{ $post->slug }}">
                        <td scope="row">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $post->title }}
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary">
                                <span data-feather="eye"></span>
                            </a>
                            <a href="" class="badge bg-warning">
                                <span data-feather="edit" stroke-width="2"></span>
                            </a>
                            {{-- <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge bg-danger border-0 btnHapus"
                                    data-slug="{{ $post->slug }}">
                                    <span data-feather="trash" stroke-width="2"></span>
                                </button>
                            </form> --}}
                            <a class="badge bg-danger border-0 btnHapus" data-slug="{{ $post->slug }}">
                                <span data-feather="trash" stroke-width="2"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('script')
    <script>
        const hapus = document.querySelectorAll('a.btnHapus');
        hapus.forEach(btnHapus => {
            btnHapus.addEventListener('click', (e) => {
                e.preventDefault();
                console.log('OK');

                const slug = btnHapus.getAttribute('data-slug');

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
                        $.ajax({
                            type: "delete",
                            url: "/dashboard/posts/" + slug,
                            success: function(response) {
                                $("#" + id).remove();
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your Post has been deleted.',
                                    imageUrl: "{{ asset('sticker/wink.png') }}",
                                    imageWidth: 200,
                                    imageHeight: 200,
                                    imageAlt: 'Custom image',
                                })
                            },
                            error: function() {
                                swalWithBootstrapButtons.fire(
                                    'Gagal!',
                                    'Data gagal dihapus.',
                                    'error'
                                )
                            },
                        });

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            title: 'Dibatalkan!',
                            text: 'Postingan kamu aman.',
                            imageUrl: "{{ asset('sticker/angel.png') }}",
                            imageWidth: 200,
                            imageHeight: 200,
                            imageAlt: 'Custom image'
                        )
                    }
                });
            });
        });
    </script>
@endsection

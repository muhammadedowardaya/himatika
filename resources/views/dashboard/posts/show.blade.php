@extends('dashboard.layouts.main')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card w-100 shadow border-0 mb-sm-5 mt-3">

                    @if ($post->image)
                        <img src=" {{ asset('storage/images/posts/' . $post->image) }}"
                            class="card-img-top img-fluid position-relative align-self-center" alt="..." style="width:30vw">
                    @else
                        <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                            class="card-img-top img-fluid position-relative" alt="...">
                    @endif


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

                    <div class="card-body">
                        <article>
                            <h5 class="card-title my-4">{{ $post->title }}</h5>
                            <p class="card-text" style="text-align: justify">{!! nl2br($post->body) !!}</p>
                            <small>Dibuat pada : {{ $post->created_at->format('Y F d') }}</small>
                        </article>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between mt-3">
                            <small style="font-size: 12px">{{ $post->created_at->diffForHumans() }}</small>
                            <small>Diupdate pada : {{ $post->updated_at->format('Y F d') }}</small>
                        </div>
                    </div>
                </div>
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

        const btnHapus = document.querySelector('a.btnHapus');
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
                        url: `{{ url('dashboard/posts/${id}') }}`,
                        data: _token,
                        // dataType: "json",
                        success: function(response) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Postingan berhasil dihapus!'
                            })
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
    </script>
@endsection

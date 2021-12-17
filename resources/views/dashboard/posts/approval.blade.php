@extends('dashboard.layouts.main')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title ?? 'Approval' }}</h1>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <a href="{{ route('approval') }}" class="btn btn-outline-primary" id="btnPending">All Posts <span
                    data-feather="list"></span></a>
            <a href="{{ route('pending') }}" class="btn btn-secondary" id="btnPending">Pending <span
                    data-feather="lock"></span></a>
            <a href="{{ route('publish') }}" class="btn btn-primary" id="btnPublish">Publish <span
                    data-feather="unlock"></span></a>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            {{-- <th scope="col">No</th> --}}
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Published</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr id="{{ $post->id }}">
                                {{-- <td scope="row">{{ $posts->perPage() * ($posts->currentPage() - 1) + $loop->iteration }}</td> --}}
                                <td>{{ $post->title }}
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    {{-- <div class="form-check form-switch">
                                        <input data-slug="{{ $post->slug }}" class="form-check-input" type="checkbox"
                                            name="approval" value="1" role="switch" id="approval" @if (1 == old('published', $post->published)) checked @endif
                                            class="form-check-label" for="approval">Checked switch
                                        checkbox
                                        @error('published')
                                            {{ $message }}
                                        @enderror
                                    </div> --}}
                                    @livewire('post-status', ['model' => $post, 'field' => 'published'], key($post->id))
                                </td>
                                <td>
                                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary">
                                        <span data-feather="eye"></span>
                                    </a>
                                    {{-- <a href="{{ route('posts.edit', $post->slug) }}" class="badge bg-warning">
                                        <span data-feather="edit" stroke-width="2"></span>
                                    </a> --}}
                                    {{-- <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="badge bg-danger border-0 btnHapus"
                                            data-slug="{{ $post->slug }}">
                                            <span data-feather="trash" stroke-width="2"></span>
                                        </button>
                                    </form> --}}
                                    <a class="badge bg-danger border-0 btnHapus" data-slug="{{ $post->slug }}"
                                        data-id="{{ $post->id }}">
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


    {{ $posts->links() }}

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
                            url: `{{ url('dashboard/posts/${id}') }}`,
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

        // const approval = document.querySelectorAll('#approval');
        // approval.forEach((btn) => {
        //     btn.addEventListener('change', function(e) {
        //         e.preventDefault();
        //         const slug = btn.getAttribute('data-slug');
        //         const _token = $('meta[name=csrf-token]').attr('content');
        //         $.ajax({
        //             type: "patch",
        //             url: `{{ url('dashboard/posts/updateApproval/${slug}') }}`,
        //             data: _token,
        //             // dataType: "dataType",
        //             success: function(response) {
        //                 // Toast_Post.fire({
        //                 //     icon: 'success',
        //                 //     title: 'Perizinan postingan berhasil diubah'
        //                 // })
        //                 console.log(response);
        //             }
        //         });
        //         // if (btn.hasAttribute('checked') === true) {
        //         //     // $.ajax({
        //         //     //     type: "patch",
        //         //     //     url: `{{ url('/dashboard/posts/updateApproval/${slug}') }}`,
        //         //     //     data: _token,
        //         //     //     // dataType: "dataType",
        //         //     //     success: function(response) {
        //         //     //         Toast_Post.fire({
        //         //     //             icon: 'success',
        //         //     //             title: 'Postingan berhasil diPublish!'
        //         //     //         })
        //         //     //     }
        //         //     // });
        //         //     console.log('checked');
        //         // } else {
        //         //     console.log('not checked');
        //         // }
        //         // else if (btn.getAttribute('checked') === false) {
        //         //     $.ajax({
        //         //         type: "patch",
        //         //         url: `{{ url('/dashboard/posts/updateApproval/${slug}') }}`,
        //         //         data: _token,
        //         //         // dataType: "dataType",
        //         //         success: function(response) {
        //         //             Toast_Post.fire({
        //         //                 icon: 'success',
        //         //                 title: 'Postingan berhasil diPending!'
        //         //             })
        //         //         }
        //         //     });
        //         // }
        //     })
        // })

        // const btnPending = document.querySelector('#btnPending');
        // const btnPublish = document.querySelector('#btnPublish');

        // btnPending.addEventListener('click', function(e) {
        //     e.preventDefault();
        //     $("#overlay").fadeIn(300);
        //     $.get(BASE + '/dashboard/posts/approval/pending', function(data) {
        //         $("#overlay").fadeOut(300);
        //         $('.table-responsive').html(data);
        //         // console.log(data);
        //         // console.log(status);
        //     });
        // })
    </script>
@endsection

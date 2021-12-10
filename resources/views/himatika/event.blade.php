<div class="container my-4">
    <h1 class="text-center">Event</h1>
    <hr>
    @if (isset($events[0]) && isset($events))
        <div class="row my-4">
            <div class="col">
                <div class="card gerak mb-3 text-sm-left text-md-center text-lg-center text-xl-center shadow border-0"
                    style="background:#119dd0">
                    {{-- <div class="kategoriLabel" title="category">
                    <a href="/posts?category={{ $posts[0]->category->slug }}"
                        class="bg-secondary py-2 px-5 text-decoration-none link-light">{{ $posts[0]->category->name }}</a>
                </div> --}}
                    @if ($events[0]->image)
                        <div
                            style="background-size:cover;background-position:center;height:300px;background-image:url('{{ asset('storage/images/posts/' . $events[0]->image) }}')">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/500x300?{{ $events[0]->category->name }}"
                            class="card-img-top img-fluid position-relative" alt="...">
                    @endif
                    <div class="card-body">
                        {{-- <p>By : <a href="/events?author={{ $events[0]->author->username }}"
                            class="link-success text-decoration-none">{{ $events[0]->author->name }}</a>
                    </p> --}}
                        <h3 class="card-title mb-4">{{ $events[0]->title }}</h3>
                        <p class="card-text">{{ Str::limit(strip_tags($events[0]->body), 200) }} <a
                                style="color:#000" href="{{ route('posts.show', $events[0]->slug) }}">Read More</a>
                        </p>

                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small
                                class="text-white">{{ $events[0]->created_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($events->skip(1) as $post)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card gerak mb-4 rounded-3 border-0 shadow"
                        style="min-height:450px;color:#fff;background:#119dd0">
                        {{-- <div class="kategoriLabel" title="category"> --}}
                        {{-- <a href="/events?category={{ $post->category->slug }}"
                            class="bg-secondary py-2 px-5 text-decoration-none link-light">{{ $post->category->name }}</a> --}}
                        {{-- </div> --}}

                        @if ($post->image)
                            <div
                                style="background-size:cover;background-position:center;height:155px;background-image:url('{{ asset('storage/images/posts/' . $post->image) }}')">
                            </div>
                        @else
                            <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                                class="card-img-top img-fluid position-relative" alt="...">
                        @endif

                        <div class="card-body">
                            {{-- <p>By : <a href="/events?author={{ $post->author->username }}"
                                class="link-success text-decoration-none">{{ $post->author->name }}</a>
                        </p> --}}
                            <article>
                                <h3 class="card-title my-3">{{ $post->title }}</h3>
                                <p class="card-text" style="text-align: justify">
                                    {{ Str::limit(strip_tags($post->body), 120) }}
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        style="z-index:10;color:#000">Read More</a>
                                </p>
                            </article>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <small style="font-size: 12px"
                                    class="mt-1">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <h5>Event not found</h5>
        </div>
    @endif

</div>

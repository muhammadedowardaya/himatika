<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="#">Himatika</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('about') ? ' active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('posts*') ? ' active' : '' }}"
                        href="{{ route('posts') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('category*') ? ' active' : '' }}"
                        href="{{ route('categories') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('login') ? ' active' : '' }}"
                        href="{{ route('login') }}">Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

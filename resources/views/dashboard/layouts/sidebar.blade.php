<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link{{ request()->is('dashboard') ? ' active' : '' }}" aria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('dashboard/posts*') ? ' active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('posts*') ? ' active' : '' }}" href="/posts">
                    <span data-feather="file-text"></span>
                    All Posts
                </a>
            </li>
        </ul>

        @can('admin', Post::class)
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('dashboard/categories*') ? ' active' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        Post Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('dashboard/approval*') ? ' active' : '' }}"
                        href="/dashboard/posts/approval">
                        <span data-feather="user-check"></span>
                        Post Approval
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="/">
                        <span data-feather="grid"></span>
                        Himatika Profile
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>

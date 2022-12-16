<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" class="h4 text-center">Mezzala</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-futbol"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="/article"><i class="fas fa-file-alt"></i> <span>Article</span></a></li>
            <li><a class="nav-link" href="/category"><i class="fas fa-layer-group"></i> <span>Category</span></a></li>
            <li><a class="nav-link" href="/sub-category"><i class="fas fa-th-list"></i> <span>Sub Category</span></a></li>
            <li><a class="nav-link" href="/tags"><i class="fas fa-tag"></i> <span>Tag</span></a></li>
            @if (auth()->user()->is_admin == 1)
                <li><a class="nav-link" href="/users"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="/" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i> Homepage
            </a>
        </div>
    </aside>
</div>

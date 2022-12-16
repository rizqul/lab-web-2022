<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (empty(auth()->user()->img_src))
                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"
                        style="width: 25px; height: 25px; fit-content: contain;">
                @elseif(str_contains(auth()->user()->img_src, 'post-images'))
                    <img alt="image"
                        src="{{ asset('storage/' . auth()->user()->img_src)}}"
                        class="rounded-circle mr-1" style="width: 25px; height: 25px; fit-content: contain;">
                @else
                    <img alt="image"
                        src="{{auth()->user()->img_src}}"
                        class="rounded-circle mr-1" style="width: 25px; height: 25px; fit-content: contain;">
                @endif
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/dashboard/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>

            </div>
        </li>
    </ul>
</nav>

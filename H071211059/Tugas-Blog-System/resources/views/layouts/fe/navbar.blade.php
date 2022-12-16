<div class="navbar">
    <div class="container">
        <h2 class="mx-auto mb-2 mt-3" id="title-page"><a href="/">Mezzala</a></h2>
    </div>
    <div class="container w-50 mt-2 menu">
        <h5><a href="/articles">Article</a></h5>
        <h5><a href="">Premier League</a></h5>
        <h5><a href="">World Cup</a></h5>
        <h5><a href="">Story</a></h5>
        <h5><a href="">Author</a></h5>
    </div>
    @if (auth()->user())
        <div class="dropdown" class="auth-btn">

            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                @if (empty(auth()->user()->img_src))
                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle mr-1"
                        style="width: 25px; height: 25px; fit-content: contain;">
                @elseif(str_contains(auth()->user()->img_src, 'post-images'))
                    <img alt="image" src="{{ asset('storage/' . auth()->user()->img_src) }}"
                        class="rounded-circle mr-1" style="width: 25px; height: 25px; fit-content: contain;">
                @else
                    <img alt="image" src="{{ auth()->user()->img_src }}" class="rounded-circle mr-1"
                        style="width: 25px; height: 25px; fit-content: contain;">
                @endif
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/dashboard/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="/dashboard" class="dropdown-item has-icon">
                    <i class="fas fa-columns"></i> Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                        Logout</button>
                </form>
            </div>
        </div>
    @else
        <a href="/login" class="auth-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
    @endif
</div>

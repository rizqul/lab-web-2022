<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hyper Grinding</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css"
        integrity="sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/22a6f5f8fa.js" crossorigin="anonymous"></script>
    @yield('head')
</head>

<body>

    {{-- Navbar --}}
    @if (Route::currentRouteName() != 'login.show')
        @if (Route::currentRouteName() != 'register.show')
            <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong fixed-top">
                <div class="container-fluid">
                    <img src="{{ asset('logo.png') }}" alt="logo" width="50" height="50"
                        class="d-inline-block align-text-top ms-5 me-2" />
                    <a class="navbar-brand my-2 d-flex justify-content-center" href="{{ route('page.homepage') }}">
                        <span class="text-third fw-bold">HYPER</span>
                        <span class="text-third fw-light">GRINDING</span>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#nav-contents" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse ps-3" id="nav-contents">
                        <span class="me-4 separator">|</span>
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" id="home-link" aria-current="page"
                                    href="{{ route('page.homepage') }}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ms-2" id="article-link" href="#">ARTICLES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ms-2" id="members-link" href="#">MEMBERS</a>
                            </li>
                        </ul>

                        @auth
                            <ul class="navbar-nav me-5">
                                <div class="dropdown">
                                    <button class="btn bg-transparent rounded-0 text-third dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (!empty(Auth::user()->avatar))
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" id="person_logo"
                                                alt="avatar">
                                        @else
                                            <img src="{{ asset('storage/users/default-avatar.png') }}" id="person_logo"
                                                alt="avatar">
                                        @endif
                                        <span id="name" class="ms-2">{{ auth()->user()->name }}</span>
                                    </button>
                                    <ul class="dropdown-menu rounded-0">
                                        <li><a class="dropdown-item fw-bold"
                                                href="{{ route('page.dashboard') }}">Dashboard</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Profile</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item fst-italic" href="{{ route('logout') }}">Log Out</a>
                                        </li>
                                    </ul>
                                </div>

                                <script>
                                    var name = '{{ auth()->user()->name }}'
                                    var arr = name.split(" ");
                                    document.getElementById("name").innerHTML = arr[0].toUpperCase();
                                </script>
                            @endauth

                            @guest
                                <ul class="navbar-nav me-5">
                                    <li>
                                        <a class="nav-link me-2" href="{{ route('register.show') }}">A NEWBIE?</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <button class="bg-transparent text-third px-3 py-2">SIGN IN</button>
                                        </a>
                                    </li>
                                </ul>
                            @endguest
                    </div>
                </div>
            </nav>
        @endif
    @endif

    @yield('page')

    {{-- Footer --}}
    @if (Route::currentRouteName() != 'login.show')
        @if (Route::currentRouteName() != 'register.show')
            <div class="container-fluid footer bg-primary mt-5">
                <footer class="py-3 p-0">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item">
                            <a href="{{ route('page.homepage') }}" class="nav-link px-2 mx-2 text-muted">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/sofyanox12" class="nav-link px-2 mx-2 text-muted">Author</a>
                        </li>
                        <li class="nav-item"><a href="mailto: gaero38@gmail.com"
                                class="nav-link px-2 mx-2 text-muted">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link px-2 mx-2 text-muted">About</a>
                        </li>
                    </ul>
                    <p class="text-center text-muted">© 2022 Sofyan Pujas, Information System</p>
                </footer>
            </div>
        @endif
    @endif

    {{-- Kasih ke tengah yang parentnya relative : position-absolute top-50 start-50 translate-middle --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        const url = window.location.href;
        var page, arr = url.split("/");

        if (arr.length > 3) {
            page = arr[3];
        }

        if (page == "home") {
            document.getElementById("home-link").classList.add("active");

        } else if (page == "article") {
            document.getElementById("article-link").classList.add("active");

        } else if (page == "member") {
            document.getElementById("members-link").classList.add("active");

        } else {
            document.getElementById("home-link").classList.add("active");
        }

        /*
         * Index's Debugger
         */

        // console.log("{{ Route::currentRouteName() }}");
    </script>

    @yield('script')

</body>

</html>

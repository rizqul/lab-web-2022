<!DOCTYPE html>
<html lang="en">

<head>
    <title>HyperGrinding Panel</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('styles/module.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @yield('head')
</head>

<body id="body-pd">

    <header class="header" id="header">

        <div class="header_toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="d-flex mt-3">
            <div class="header_img">
                <i class="bi bi-person"></i>
            </div>
            <div class="display-7 text-capitalize">{{ Auth::user()->name }}</div>
        </div>
    </header>

    <div class="l-navbar bg-primary" id="nav-bar">
        <nav class="nav">

            <div>
                <a href="#" class="nav_logo text-third">
                    <i class="bi bi-toggles"></i>
                    <span class="nav_logo-name">HYPERGRIND</span>
                </a>

                <div class="nav_list">
                    @if (Str::contains(Request::url(), 'panel/dashboard'))
                        <a href="#" class="nav_link text-third active">
                        @else
                            <a href="{{ route('page.dashboard') }}" class="nav_link text-third">
                    @endif
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                    </a>

                    @if (Str::contains(Request::url(), 'panel/articles'))
                        <a class="nav_link text-third active">
                        @else
                            <a href="{{ route('page.articles') }}" class="nav_link text-third">
                    @endif
                    <i class='bx bx-message-square-detail nav_icon'></i>
                    <span class="nav_name">Articles</span>
                    </a>

                    @if (Str::contains(Request::url(), 'panel/categories'))
                        <a class="nav_link text-third active">
                        @else
                            <a href="{{ route('page.categories') }}" class="nav_link text-third">
                    @endif
                    <i class='bx bx-folder nav_icon'></i>
                    <span class="nav_name">Categories</span>
                    </a>

                    @if (Str::contains(Request::url(), 'panel/tags'))
                        <a class="nav_link text-third active">
                        @else
                            <a href="{{ route('page.tags') }}" class="nav_link text-third">
                    @endif
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Tags</span>
                    </a>

                    @if (Str::contains(Request::url(), 'panel/users'))
                        <a class="nav_link text-third active">
                        @else
                            <a href=" {{ route('page.users') }}" class="nav_link text-third">
                    @endif
                    <i class='bx bx-user nav_icon'></i>
                    <span class="nav_name">Users</span>
                    </a>
                </div>
            </div>


            <div>
                <a href="{{ url('/') }}" class="nav_link text-third">
                    <i class="bi bi-house"></i>
                    <span class="nav_name">Homepage</span>
                </a>
                <a href="{{ route('logout') }}" class="nav_link text-third">
                    <i class='bx bx-log-out nav_icon'></i>
                    <span class="nav_name">Sign Out</span>
                </a>
            </div>

        </nav>
    </div>

    <div class="height-100 content">
        @yield('content')
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const
                    toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {

                        // show navbar
                        nav.classList.toggle('show-sidebar')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

        });
    </script>

    @yield('script')
</body>

</html>

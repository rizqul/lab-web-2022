<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Planetary Management</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid mx-3">

            <a class="navbar-brand display-7 text-light">
                <i class="bi bi-book-fill d-inline-block align-center mx-3 text-red"></i>
                <b>
                    <span class="text-cooper letter-spacing">MY</span>
                    <span class="text-yellow letter-spacing">DAILY</span>
                    <span class="letter-spacing">READING</span>
                </b>
            </a>

            <form class="d-flex my-2" role="search" method="post">
                <input class="form-control me-2 rounded-0" type="search" placeholder="E.G History Book"
                    aria-label="Search" name="search" id="search-input">
                <button class="btn bg-cooper" type="submit" name="find" id="search-button">
                    <i class="bi bi-search"></i></button>
                <button class="btn bg-cooper" style="display: none;" type="submit" name="back" id="back-button">Show
                    All</button>
            </form>

        </div>
    </nav>

    @include('contents.table')
    @include('contents.update')
    @include('contents.delete')

    {{-- <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>

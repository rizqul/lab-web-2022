<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tugas IX</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script>
        function importJS(file) {
            var script = document.createElement('script');
            script.src = file + '.js';
            document.head.appendChild(script);
        }
    </script>

</head>

<body>

    @include('layout.sidebar')

    @include('content.products')
    @include('content.categories')
    @include('content.sellers')
    @include('content.permissions')
    @include('content.seller_permissions')

    @include('layout.modal')

    <script src="{{ asset('script.js') }}"></script>

    @if (session('showProducts'))
        <script> showAlready('products-tab', 'show-products') </script>

    @elseif (session('showCategories'))
        <script> showAlready('categories-tab', 'show-categories') </script>

    @elseif (session('showSellers'))
        <script> showAlready('sellers-tab', 'show-sellers') </script>

    @elseif (session('showPermissions'))
        <script> showAlready('permissions-tab', 'show-permissions') </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

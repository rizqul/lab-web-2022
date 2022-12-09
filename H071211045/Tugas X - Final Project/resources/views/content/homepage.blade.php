@extends('index')

@section('homepage')
    @include('navbar.guest')
    {{-- @include('element.admin-navbar') --}}

    <div class="wrapper-landing position-relative d-inline-block ">
        <img src="{{ asset('contents/homeimg.jpg') }}" alt="landing-image" class="img-fluid">
        <div class="position-absolute top-50 start-50 translate-middle display-6 text-fourth">
            Together, We master the art of leveling up.
        </div>
    </div>
    

@endsection

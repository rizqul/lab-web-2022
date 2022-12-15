@extends('layout.user')
@section('content')
<div class="page-sidebar text-center">
                <h6 class="sidebar-title section-title mb-4 mt-3">About</h6>
                <img src="{{asset('blogTemplate/assets/imgs/unknown_pic.jpg')}}" alt="" class="circle-100 mb-3">
                <div class="socials mb-3 mt-2">
                    <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                    <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                    <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                    <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                    <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
                </div>
                @foreach($data as $item)
                <p><b>Name: </b> {{$item -> name}} </p>
                <p><b>Email: </b> {{$item -> email}} </p>
                <p><b>Join Date: </b> {{$item -> created_at}} </p>
                @endforeach
            </div>
@endsection
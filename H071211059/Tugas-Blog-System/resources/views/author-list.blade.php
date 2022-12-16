@extends('layouts.fe.master')

@section('main-content')
    <div class="col-9">
        <h2 class="text-center mb-4">Authors</h2>
        <div class="author-container">
            @foreach ($authors as $author)
                <div class="author-list">
                    <div class="author-img">
                        @if (str_contains($author->img_src, 'post-images'))
                            <img src="{{ asset('storage/' . $author->img_src) }}" alt="" class="rounded-circle">
                        @elseif (empty($author->img_src))
                            <img src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="" class="rounded-circle">
                        @else
                            <img src="{{ $author->img_src }}" alt="" class="rounded-circle">
                        @endif
                    </div>
                    <div class="title-list h5 text-center">{{ $author->name }}</div>
                </div>
            @endforeach
        </div>
        {!! $authors->links('pagination::bootstrap-4') !!}
    </div>
@endsection

@section('side-panel')
    @include('layouts.fe.side-panel')
@endsection

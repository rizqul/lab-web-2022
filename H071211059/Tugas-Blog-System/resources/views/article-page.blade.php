@extends('layouts.fe.master')

@section('main-content')
    <div class="col-10 mx-auto">
        <div class="title-page">
            <h1>
                {{ $article->title }}
            </h1>
            <p>
                {{$article->user->name}}
            </p>
        </div>
        <div class="banner">
            @if (str_contains($article->banner, 'article-banners'))
                <img src="{{ asset('storage/' . $article->banner) }}" alt="">
            @else
                <img src="{{ $article->banner }}" alt="">
            @endif
        </div>
        <div class="article-content">
            {!!$article->content!!}
        </div>
    </div>
@endsection

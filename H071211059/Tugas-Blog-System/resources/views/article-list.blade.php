@extends('layouts.fe.master')

@section('main-content')
    <div class="col-9">
        <h2 class="text-center mb-4">Articles</h2>
        <div class="article-container">
            @foreach ($articles as $article)
                <div class="articles-list">
                    <div class="banner-list">
                        @if (str_contains($article->banner, 'article-banners'))
                            <img src="{{ asset('storage/' . $article->banner) }}" alt="">
                        @else
                            <img src="{{ $article->banner }}" alt="">
                        @endif
                    </div>
                    <div class="title-list h5">{{ $article->title }}</div>
                    <div class="author-list">Erwin Arif</div>
                </div>
            @endforeach
        </div>
        {!! $articles->links('pagination::bootstrap-4') !!}
    </div>
@endsection

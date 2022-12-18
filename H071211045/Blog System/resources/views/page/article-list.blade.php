@extends('index')

@section('head')

@endsection

@section('page')
    <div class="bg-dark py-5"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="display-6 text-primary fw-bold">Articles</div>
                <hr>
            </div>
        </div>
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-4">
                    <div class="card bg-dark mb-2">
                        <div class="card-body">
                            <a href="/p/{{ $article->slug }}">
                                @if ($article->banner)
                                    <img src="{{ asset('storage/' . $article->banner) }}" alt="post-image"
                                        class="img-fluid">
                                @else
                                    <img src="{{ asset('storage/default-banner.png') }}" alt="post-image" class="img-fluid">
                                @endif
                            </a>
                            <a href="/p/{{ $article->slug }}" class="text-title text-third d-inline-block fw-bold">
                                {{ $article->title }}
                            </a>
                            <p class="text-white mt-2 description">
                                {{ $article->description }}
                            </p>
                            <a href="/p/{{ $article->slug }}" class="p-2 bg-secondary text-third d-inline-block">
                                <span class="me-1">Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center mt-4 d-flex justify-content-center">
                    <p class="text-secondary fw-bold m-auto">
                        <\> No articles yet Bro.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@extends('index')

@section('head')
    <style>
        body {
            background-color: var(--secondary);
        }
        .card-body hr {
            color: white;
        }

        .post-contents, .post-contents p, .post-contents span, .post-contents div, .post-contents h1, .post-contents h2, .post-contents h3, .post-contents h4, .post-contents h5, .post-contents h6 {
            color: white;
            /* background-color: white */
        }

        .submit:hover {
            background-color: var(--third) !important;
            color: var(--primary) !important;
        }
    </style>
@endsection

@section('page')
    <div class="p-5 bg-dark"></div>
    <div class="container px-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="display-6 text-third fw-bold">{{ $article->title }}</div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card bg-dark mb-2">
                        <div class="card-body mt-3">
                            <a href="/p/{{ $article->slug }}">
                                @if ($article->banner)
                                    <img src="{{ asset('storage/' . $article->banner) }}" alt="post-image"
                                        class="img-fluid">
                                @else
                                    <img src="{{ asset('storage/default-banner.png') }}" alt="post-image" class="img-fluid">
                                @endif
                            </a>
                            <p class="text-white mt-3 description">
                                {{ $article->description }} <br>
                                <span class="text-third">Published at {{ $article->created_at }}</span><br>
                                <span class="text-third fw-bold">by {{ $author }}</span>
                            </p>
                            <hr>
                            <div class="post-contents">
                            @if ($article->content)
                            
                                {!! $article->content !!}
                            @else
                                <\> No contents Made in this post.
                            @endif
                            </div>
                            {{-- Like button --}}
                            <div class="d-flex justify-content-between">
                                <div class="d-flex">
                                    <form action="{{route('like')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <button type="submit" class="btn btn-primary rounded-0">
                                            <i class="bi bi-hand-thumbs-up"></i>
                                        </button>
                                    </form>
                                    <div class="text-white mt-2 ms-2">
                                        {{ $article->likes }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="display-6 text-primary fw-bold">Comments</div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card bg-dark mb-2">
                        <div class="card-body">
                            @if (Auth::check())
                                
                            
                            <form action="{{route('comment')}}" method="POST">
                                @csrf
                                <input type="hidden" name="article_id" value="{{ $article->id }}">
                                <div class="mb-3">
                                    <label for="comment" class="form-label text-white">Comment</label>
                                    <textarea class="form-control rounded-0" id="comment" name="comment" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn bg-primary submit text-third rounded-0">Submit</button>
                            </form>

                            @else
                                <p class="text-white mt-2 description">
                                    <\> You need to login to comment
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                        <div class="col-12">
                            @forelse ($comments as $comment)
                                <div class="card bg-dark mb-2">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-white fw-bold">{{ $comment->username }}</div>
                                            <hr>
                                            <div class="text-secondary">{{ $comment->created_at }}</div>
                                        </div>
                                        <p class="text-white mt-2 description">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="card bg-dark mb-2">
                                    <div class="card-body">
                                        <p class="text-white mt-2 description">
                                            <\> No comments yet
                                        </p>
                                    </div>
                                </div>
                                
                            @endforelse
                        </div>
                    </div>
                </div>

        
    </div>
@endsection

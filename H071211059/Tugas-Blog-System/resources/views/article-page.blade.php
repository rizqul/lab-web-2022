@extends('layouts.fe.master')

@section('main-content')
    <div class="col-10 mx-auto">
        <div class="title-page">
            <h1>
                {{ $article->title }}
            </h1>
            <p>
                {{ $article->user->name }}
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
            {!! $article->content !!}
        </div>
    </div>
@endsection

@section('comment-section')
    <div class="d-flex">
        <i class="far fa-heart mr-2" id="like-btn" style="color: red; font-size: 24px;"></i>
        <p class="mr-3">11</p>
        <i class="far fa-comment-alt " id="comment-btn" style="color: red; font-size: 22px;"></i>
    </div>
    <div class="comment-section mt-4">
        <div class="comment-form">
            <input type="hidden" name="article-id" id="article-id" value="{{ $article->id }}">
            <label for="comment-input">Comment</label>
            <textarea class="form-control" id="comment-input" rows="4" placeholder="Leave a comment..."></textarea>
            <button class="btn btn-success mt-2 float-right" id="submit-btn">Submit</button>
        </div>
        <div class="mx-3 the-comment mt-5">
            <div class="author-name">
                <h5>Author Name</h5>
            </div>
            <div class="comment">
                <p class="h5">Comment</p>
            </div>
        </div>
    </div>
@endsection

@section('spesific-js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '#submit-btn', function() {
            let article_id = $('#article-id').val();
            let comments = $('#comment-input').val();
            console.log(article_id);

            $.ajax({
                type: "post",
                url: "/comments",
                data: {id: article_id, 
                        comments: comments},
                success: function(response) {
                    console.log(response);
                }
            });
        });

        $(document).on('click', '#comment-btn', function() {

        });

        $(document).on('click', '#like-btn', function() {
            if ($(this).hasClass('far')) {
                $(this).removeClass('far')
                $(this).addClass('fas')
            } else if ($(this).hasClass('fas')) {
                $(this).removeClass('fas')
                $(this).addClass('far')
            }
        });
    </script>
@endsection

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
    <i class="far fa-heart mr-2" id="like-btn" style="color: red; font-size: 24px;"></i>
    <i class="far fa-comment-alt " id="comment-btn" style="color: red; font-size: 22px;"></i>
    <div class="comment-section mt-4">
        <div class="comment-form">
            <input type="hidden" name="article-id" id="article-id" value="{{ $article->id }}">
            <label for="comment-input">Comment</label>
            <textarea class="form-control" id="comment-input" rows="4" placeholder="Leave a comment..."></textarea>
            <button class="btn btn-success mt-2 float-right" id="submit-btn">Submit</button>
        </div>
        <div class="mx-3 the-comment mt-5 pt-5" id="user-comment">
            @foreach ($comments as $comment)
                <div class="author-name">
                    <h6 class="lead">{{ $comment->user->name }}</h6>
                </div>
                <div class="comment">
                    <p class="h6">{{ $comment->comments }}</p>
                </div>
                <hr>
            @endforeach
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
                data: {
                    id: article_id,
                    comments: comments
                },
                success: function(response) {
                    $('#user-comment').prepend("<hr>")
                    $('#user-comment').prepend("<div class='comment'> <p class='h6'>" + response
                        .comment + "</p></div>"
                    )
                    $('#user-comment').prepend(
                        "<div class='author-name'><h6 class='lead'>" + response.user_name +
                        "</h6> </div>"
                    )
                    $('#comment-input').val("");
                }
            });
        });

        $(document).on('click', '#comment-btn', function() {
            $('.comment-section').show();
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

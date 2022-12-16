<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mezzala</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/components.css">
    <link rel="stylesheet" href="../fe/scss/style.css">
</head>

<body>
    @include('layouts.fe.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-5 best-article">
                @isset($top_articles)

                    <div id="img-top-post">
                        @if (str_contains($top_articles[0]->banner, 'article-banners'))
                            <img src="{{ asset('storage/' . $top_articles[0]->banner) }}" alt="">
                        @else
                            <img src="{{ $top_articles[0]->banner }}" alt="">
                        @endif

                    </div>
                    <div class="title h5 mt-3">
                        {{ $top_articles[0]->title }}
                    </div>
                    <div class="article-desc">
                        <p>
                            {!! $top_articles[0]->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-4">
                    @for ($i = 1; $i < count($top_articles); $i++)
                        <div class="top-article d-flex">
                            <div class="" style="width: 65%">
                                <div class="title h6">
                                    {{ $top_articles[$i]->title }}
                                </div>
                                <p class="fs-6">{{ $top_articles[$i]->user->name }}</p>
                            </div>
                            <div class="img-article ms-auto">
                                @if (str_contains($top_articles[$i]->banner, 'article-banners'))
                                    <img src="{{ asset('storage/' . $top_articles[$i]->banner) }}" alt="">
                                @else
                                    <img src="{{ $top_articles[$i]->banner }}" alt="">
                                @endif
                            </div>
                        </div>
                    @endfor
                </div>



                <div class="col-3">
                    <div class="top-categories mb-3">
                        <div class="title topic-title">
                            <p class="h3 mb-3">Popular Topic</p>
                        </div>
                        <div class="topic-section">
                            @foreach ($top_category as $category)
                                <div class="top-topic">{{ $category->name }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="top-authors">
                        <div class="title author-title">
                            <p class="h3 mb-3">Authors</p>
                        </div>
                        <div class="author-section">
                            @foreach ($top_authors as $author)
                                <div class="top-author d-flex">
                                    @if (empty($author->img_src))
                                        <img alt="image" src="../assets/img/avatar/avatar-2.png"
                                            class="rounded-circle profile-widget-picture"
                                            style="width: 30px; height: 30px; object-fit: cover;">
                                    @elseif(str_contains($author->img_src, 'post-images'))
                                        <img alt="image" src="{{ asset('storage/' . $author->img_src) }}"
                                            class="rounded-circle profile-widget-picture"
                                            style="width: 30px; height: 30px; object-fit: cover;">
                                    @else
                                        <img alt="image" src="{{ $author->img_src }}"
                                            class="rounded-circle profile-widget-picture"
                                            style="width: 30px; height: 30px; object-fit: cover;">
                                    @endif
                                    <p class="my-auto h5 ml-3">{{ $author->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endisset


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    </script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../fe/js/main.js"></script>
</body>

</html>

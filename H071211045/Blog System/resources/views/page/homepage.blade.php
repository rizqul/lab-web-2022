@extends('index')

@section('page')
    <div class="wrapper-landing position-relative d-inline-block">
        <img src="{{ asset('contents/homeimg.jpg') }}" alt="landing-image" class="img-fluid">
        <div class="position-absolute top-50 start-50 translate-middle display-6 text-fourth">
            Together, We master the art of leveling up.
        </div>
    </div>

    <div class="row mt-3 w-75 d-flex m-auto position-relative">

        <div class="col-9 p-0 popular-articles">
            <div class="display-6 mb-1 mt-3">Popular Articles</div>

            <div class="content">
                @forelse ($popularArticles as $article)
                    <div class="row mt-4 me-4 mb-5">
                        <div class="col-4">
                            <a href="#">
                                @if ($article->banner)
                                    <img src="{{ asset('storage/' . $article->banner) }}" alt="post-image"
                                        class="img-fluid">
                                @else
                                    <img src="{{ asset('storage/default-banner.png') }}" alt="post-image" class="img-fluid">
                                @endif
                            </a>
                        </div>
                        <div class="col-8">
                            <a href="#"
                                class="text-title text-primary d-inline-block fw-bold">{{ $article->title }}</a>
                            <p class="text-secondary mt-2 description">
                                {{ $article->description }}
                            </p>
                            <a href="#" class="p-2 bg-secondary text-third d-inline-block">
                                <span class="me-1">Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
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

        <div class="col p-0">
            <div class="container bg-third latest-posts p-2">
                <div class="display-7 text-primary fw-bold">LATEST POSTS <i class="ms-2 bi bi-menu-up"></i></div>
                <hr>
                @forelse ($latestArticles as $article)
                    <div class="mb-3 content">
                        <a href="/p/{{ $article->slug }}">
                            <img src="https://www.runtastic.com/blog/wp-content/uploads/2019/02/533_do-your-first-push-up_ft-1024x683.jpg"
                                alt="post-image" class="img-fluid mb-1">
                        </a>
                        <a href="/p/{{ $article->slug }}" class="text-primary ">{{ $article->description }}</a>
                    </div>
                    <hr>
                @empty
                    <div class="text-center d-flex justify-content-center">
                        <p class="text-third rounded px-2 bg-primary fw-bold m-auto">
                            <\> No articles yet Bro.
                        </p>
                    </div>
                @endforelse
            </div>
            <div class="container d-inline-block pb-2 bg-secondary">
                <div class="display-7 text-third p-3">Top Categories <i class="bi bi-bookmark"></i></div>
                @forelse ($popularCategories as $category)
                    <div class="bg-third mb-2">
                        <div class="row px-4 py-3">
                            <div class="col-1">
                                <i class="bi bi-arrow-right text-primary"></i>
                            </div>
                            <div class="col">
                                <span href="#" class="text-primary">Web Development</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center  d-flex justify-content-center">
                        <p class="text-third bg-primary px-3 mb-2 rounded fw-bold m-auto">
                            <\> No categories yet Bro.
                        </p>
                    </div>
                @endforelse


            </div>

        </div>


    </div>
@endsection

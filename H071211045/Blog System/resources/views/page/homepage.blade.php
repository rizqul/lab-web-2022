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
                <div class="row mt-4 me-4">
                    <div class="col-4">
                        <a href="#">
                            <img src="https://wallpaperaccess.com/full/460863.jpg" alt="post-image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-8">
                        <a href="#" class="text-title text-primary d-inline-block fw-bold">How to build your Chest</a>
                        <p class="text-secondary mt-2 description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat ab earum sapiente tenetur consequatur eligendi, enim et consectetur fuga deserunt ratione magni ipsa quibusdam optio facere possimus! Accusantium, ratione quae. Rem cum velit assumenda iusto quis. Ad iste sit, voluptas facere ut ipsam maiores, minus, beatae alias temporibus explicabo laboriosam.
                        </p>
                        <a href="#" class="p-2 bg-secondary text-third d-inline-block">
                            <span class="me-1">Read More</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="row mt-4 me-4">
                    <div class="col-4">
                        <a href="#">
                            <img src="https://wallpaperaccess.com/full/460863.jpg" alt="post-image" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-8">
                        <a href="#" class="text-title text-primary d-inline-block fw-bold">How to build your Chest</a>
                        <p class="text-secondary mt-2 description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat ab earum sapiente tenetur consequatur eligendi, enim et consectetur fuga deserunt ratione magni ipsa quibusdam optio facere possimus! Accusantium, ratione quae. Rem cum velit assumenda iusto quis. Ad iste sit, voluptas facere ut ipsam maiores, minus, beatae alias temporibus explicabo laboriosam.
                        </p>
                        <a href="#" class="p-2 bg-secondary text-third d-inline-block">
                            <span class="me-1">Read More</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="col p-0">
            <div class="container bg-third latest-posts p-2">
                <div class="display-7 text-primary fw-bold">LATEST POSTS</div>
                <hr>

                <div class="mb-3 content">
                    <a href="#">
                        <img src="https://www.runtastic.com/blog/wp-content/uploads/2019/02/533_do-your-first-push-up_ft-1024x683.jpg" alt="post-image" class="img-fluid mb-1">
                    </a>
                    <a href="#" class="text-primary ">How to do a push up</a>
                </div>
                <hr>

                <div class="mb-3 content">
                    <a href="#">
                        <img src="https://wallpaperaccess.com/full/460863.jpg" alt="post-image" class="img-fluid">
                    </a>
                    <a href="#" class="text-primary d-inline-block">How to Build a good chest</a>
                </div>
                <hr>

                <div class="mb-3 content">
                    <a href="#">
                        <img src="https://wallpaperaccess.com/full/460863.jpg" alt="post-image" class="img-fluid">
                    </a>
                    <a href="#" class="text-primary d-inline-block">How to Build a good chest</a>
                </div>
                <hr>
                
                <div class="mb-3 content">
                    <a href="#">
                        <img src="https://www.runtastic.com/blog/wp-content/uploads/2019/02/533_do-your-first-push-up_ft-1024x683.jpg" alt="post-image" class="img-fluid">
                    </a>
                    <a href="#" class="text-primary d-inline-block">How to do a push up</a>
                </div>
                

            </div>
        </div>

    </div>
    
@endsection

@extends('module')

@section('content')
    <div class="display-5 pt-4">Dashboard</div>
    <div>
        <div class="row">
            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Chads Joined</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center">{{ $totalUsers }}</span>
                </div>
            </div>


            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Articles Created</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center">{{ $totalArticles }}</span>
                </div>
            </div>

            <div class="col my-4" align="center">
                <div class="dash-stats border p-3 bg-fourth">
                    <i class="d-flex justify-content-center bi bi-people-fill"></i>
                    <div class="font-title text-center">Total Visitors</div>
                    <span id="total_member" class="display-5 fw-bold d-flex justify-content-center"> {{ $totalVisitors }}</span>
                </div>
            </div>
        </div>

    </div>


    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Likes</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Likes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostLikedArticles as $article)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category_name }}</td>
                        <td>{{ $article->likes }}</td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Comments</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostCommentedArticles as $article)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category_name }}</td>
                        <td>{{ $article->comments }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row px-5">
        <table class="table table-hover table-borderless border caption-top">
            <caption>Articles with Most Visits</caption>
            <thead class="bg-primary text-third">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Visitors</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostViewedArticles as $article)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category_name }}</td>
                        <td>{{ $article->visitors }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

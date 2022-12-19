@extends('layouts.dashboard.master')

@section('page-title')
    Dashboard - {{ auth()->user()->name }}
@endsection

@section('module-title')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
@endsection

@section('page-content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_user }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Article</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_article }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-heart"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Likes</h4>
                    </div>
                    <div class="card-body">
                        {{ $total_likes }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Most Liked </h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Like</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($most_likes as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ '/articles/' . $item->slug }}"
                                                style="color: inherit">{{ $item->title }}</a>
                                        </td>
                                        <td>
                                            <p>{{ $item->user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->likes_count }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Most View </h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Views</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($most_views as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ '/articles/' . $item->slug }}"
                                                style="color: inherit">{{ $item->title }}</a>
                                        </td>
                                        <td>
                                            <p>{{ $item->user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->view_count }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Most Comment </h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($most_comments as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ '/articles/' . $item->slug }}"
                                                style="color: inherit">{{ $item->title }}</a>
                                        </td>
                                        <td>
                                            <p>{{ $item->user->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->comments_count }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

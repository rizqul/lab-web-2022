@extends('layout.user')
@section('content')
<div class="container" style="margin-top: 30px;">
        <div class="row">
            @foreach($data as $item)
            <div class="col-lg-4">
                <div class="card text-center mb-5">
                    <div class="card-header p-0">
                        <div class="blog-media">
                            <img src="http://127.0.0.1:8000/blogTemplate/assets/imgs/blog2.jpg" alt="" class="w-100">
                            <a href="#" class="badge badge-primary">#{{ $item -> category_id }}</a>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h5 class="card-title mb-2">{{$item -> title}}</h5>
                        <small class="small text-muted">{{$item -> created_at}}
                            <span class="px-2">-</span>
                            <a href="#" class="text-muted">0 Comments</a>
                        </small>
                        <p class="my-2">{{ $item->description }}</p>
                    </div>

                    <div class="card-footer p-0 text-center">
                        <a href="publicArticleDetail/{{ $item->id }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="paginationButtonLink">
        {{$data->links()}}
    </div>
    @endsection
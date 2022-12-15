@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Article</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active"><a href="articles">Articles</a></li>
                        <li class="breadcrumb-item active">Edit Articles</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body row">

                <div class="col-12">
                    <div class="form-group">
                        @foreach($data4 as $item)
                        <form action="/editArticle/{{$item->id}}" method="POST">
                        @endforeach
                            @csrf
                                <label for="inputName">Title</label>
                                @foreach($data4 as $item)
                                <input type="text" id="title" name="title" value="{{$item->title}}" class="form-control">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Description (At least 20 characters)</label>
                                @foreach($data4 as $item)
                                <input type="text" id="description" name="description" class="form-control" value="{{$item->description}}">
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Category</label>
                                <select class="form-select" name="category" aria-label="Default select example">
                                    <option selected>-- Category</option>
                                    @foreach($data as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Sub Category</label>
                                <select class="form-select" name="subCategory" aria-label="Default select example">
                                    <option selected>-- Sub Category</option>
                                    @foreach($data3 as $item)
                                    <option value="{{$item->id}}">{{$item -> name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="inputEmail">Tag</label>
                            <div class="form-group">
                                @foreach ($data2 as $item)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="tags{{$item->id}}" value="{{ $item->id }}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $item -> name }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Articles's Body</label>
                                @foreach($data4 as $item)
                                <textarea id="body" class="form-control" name="body" rows="4" value="{{$item->body}}">{{ $item->body }}</textarea>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="" selected>-- Status</option>
                                    <option value="archived">Archived</option>
                                    <option value="Published">Published</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
@endsection
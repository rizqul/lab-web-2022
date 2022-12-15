@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Your Articles</h2>
        </div>
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title p-2 flex-grow-1">Articles's Table</h3>
                <a class="btn bg-gradient-primary p-2" href="createArticle" role="button">+ Created Article</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered" id="tableBlog">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Favorite</th>
                            <th>Comment</th>
                            <th>Read</th>
                            <th>Created At</th>
                            <th style="width: 40px">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td> {{ $item->title }} </td>
                            <td>{{ $item->description }}</td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                            <a class="btn btn-danger" href="articleDetail/{{$item -> id}}/{{$item->member_id}}" role="button">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            
        </div>
    </section>
</div>
@endsection
@extends('layout.user')
@section('content')
<div class="container" style="margin-top: 30px;">
<h1 class="text-center" >Article List</h1>
<table class="table table-striped" id="tableBlog">
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Title</th>
               <th scope="col">Category</th>
               <th scope="col">Created At</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($data as $index => $item)
            <tr>
               <th>{{ $index + 1 }}</th>
               <td>{{$item->title}}</td>
               <td>{{ $item->category_id }} </td>
               <td>{{ $item->created_at }}</td>
               <td><a class="btn btn-primary rounded" href="publicArticleDetail/{{ $item->id }}">Detail</a></td>
            </tr>
            @endforeach
         </tbody>
</table>
    @endsection
@extends('layout.user')
@section('content')
<div class="container" style="margin-top: 20px;">
<h1 class="text-center" >Member List</h1>

<table class="table table-striped" id="tableBlog">
         <thead>
            <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col">Article's Created</th>
               <th scope="col">Join Date</th>
               <th scope="col">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($data as $index => $item)
            <tr>
               <th>{{ $index + 1 }}</th>
               <td>{{$item->name}}</td>
               <td>{{ $item->articles_count }} </td>
               <td>{{ $item->created_at }}</td>
               <td><a class="btn btn-primary rounded" href="memberDetail/{{ $item->id }}">Detail</a></td>
            </tr>
            @endforeach
         </tbody>
</table>
</div>
@endsection
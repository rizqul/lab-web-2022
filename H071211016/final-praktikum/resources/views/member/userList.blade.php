@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">User List</h2>
        </div>
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title p-2 flex-grow-1">User List's Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered" id="tableBlog">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Name</th>
                            <th>Artilce Authored</th>
                            <th>Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td> {{ $item->name }} </td>
                            <td>{{ $item -> email }}</td>
                            <td> {{$item -> username}} </td>
                            <td> {{$item -> id}} </td>
                            <td> {{ $item->created_at }} </td>
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
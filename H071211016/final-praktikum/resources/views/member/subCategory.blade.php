@extends('layout.admin');
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Your Sub Category</h2>
        </div>
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title p-2 flex-grow-1">Sub Category's Table</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory">
                    + Create Sub Category
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered" id="tableBlog">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Article's Count</th>
                            <th>Created At</th>
                            <th>Author</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{$item -> category_id}} </td>
                            <td>{{ $item->articles_count }}</td>
                            <td> {{$item -> created_at}} </td>
                            <td> {{ Auth::user()->name }} </td>
                            <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#subCategoryEdit{{$item -> id}}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#subCategoryDelete{{$item -> id}}">
                                Delete
                            </button>
                            </td>
                        </tr>
                       <!-- Edit Category Modal -->
                        <div class="modal fade" id="subCategoryEdit{{$item -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sub Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="editSubCategory/{{$item->id}}" method="POST">
                                        @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $item -> name }}" placeholder="Enter Category's Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <select class="form-select" name="categoryName" aria-label="Default select example">
                                            @foreach ($data2 as $items)
                                            <option value="{{ $items -> id }}" selected> -- {{ $items -> name }}</option>
                                            <option value="{{ $items -> id }}">{{ $items -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>

                         <!-- Delete Category Modal -->
                         <div class="modal fade" id="subCategoryDelete{{$item -> id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Sub Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure? This action will delete all your articles that have this category
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a type="button" class="btn btn-danger" href="deleteSubCategory/{{ $item->id }}">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
    </section>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="createSubCategory" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Category's Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <select class="form-select" name="categoryName" aria-label="Default select example">
                            <option value="" selected>Open this select menu</option>
                            @foreach ($data2 as $item)
                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
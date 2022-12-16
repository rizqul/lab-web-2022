<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Laravel-2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="/category">Category</a>
                    <a class="nav-link" href="/products">Product</a>
                    <a class="nav-link active" aria-current="page" href="/sellers">Seller</a>
                    <a class="nav-link" href="/seller-permission">Seller Permission</a>
                    <a class="nav-link" href="/permission">Permission</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addSeller" type="button">Add Seller</button>

    <div class="modal fade" id="addSeller" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Add Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="saveSellerUseEloquent" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="gender" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No. HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="status" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            @foreach ($errors->all() as $error)
                <strong> {{$error}} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endforeach
    </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                <strong> {{$message}} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($message = Session::get('exist'))
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                <strong> {{$message}} </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    <table class="table mt-5">
        <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Address</th>
              <th scope="col">Gender</th>
              <th scope="col">No. HP</th>
              <th scope="col">Status</th>
              <th scope="col">Products</th>
              <th scope="col">Permission</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $index => $item)
            <tr>
                <td> {{ $index + $data->firstItem() }} </td>
                <td> {{ $item->name }} </td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->gender }}</td>
                <td>Rp. {{ $item->no_hp }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @foreach($item->products as $product)
                        - {{$product->name}} <br>
                    @endforeach
                </td>
                <td>
                    @foreach($item->permissions as $permission)
                        - {{$permission->name}} <br>
                    @endforeach
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSeller{{ $item->id }}" type="button">Edit</button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeller{{ $item->id }}" type="button">Hapus</button>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="deleteSeller{{ $item->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">Confirm</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Hapus Data {{ $item->name }} ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" class="btn btn-danger" href="deleteSellerUseQueryBuilder/{{ $item->id }}">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editSeller{{ $item->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Edit Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="editSellerUseEloquent/{{ $item->id }}" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $item->name }}" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">address</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $item->address }}" class="form-control" name="address" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $item->gender }}" class="form-control" name="gender" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">No. HP</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $item->no_hp }}" class="form-control" name="no_hp" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $item->status }}" class="form-control" name="status" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="edit" class="btn btn-primary">Simpan Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </tbody>
    </table>
    </div>
    <div class="paginationButtonLink">
        {{ $data->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
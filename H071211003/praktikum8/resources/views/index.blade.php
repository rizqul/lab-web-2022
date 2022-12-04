<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <!-- Content here -->
    <h2 class = "text-center my-6" >DATA MAHASISWA</h2>

    <div class="container p-4">
      <a href="/insertdata" class="btn btn-success">Create</a>
      <div class="row p-4">
        @if ($massage = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $massage }}
          </div>
        @endif
        <span class="border">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Fakultas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $row)
            <tr>
              <td scope="row">{{ $row->id}}</td>
              <td>{{ $row->nim}}</td>
              <td>{{ $row->nama}}</td>
              <td>{{ $row->alamat}}</td>
              <td>{{ $row->fakultas}}</td>
              <td>
                <a href ="/edit/{{ $row->id }}"  class="btn btn-success">Edit</a>
                <a href="/delete/{{ $row->id }}" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </span>
        {{ $data->links() }}
      </div>
    </div>

    <!-- Content here -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

    <!-- Sweet Alert Connection CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  <script>
      $('.delete').click(function(){
            var mahasiswaid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            swal({
                title: "Apakah kamu yakin?",
                text: "Kamu akan menghapus data dengan nama "+nama+" ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
              .then((willDelete) => {
              if (willDelete) {
                  window.location = "/delete/"+mahasiswaid+""
                  swal("Data berhasil di hapus!", {
                  icon: "success",
                  });
              } else {
                  swal("Batal menghapus data!");
              }
            });
      })

  </script>
</html>
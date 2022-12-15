<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <h1 class="text-center mt-4 mb-4"> Data Mahasiswa</h1>

      <div class="container">
      <a href="/tambahmahasiswa" class="btn btn-primary mb-3">Tambah +</a>
          <div class="row mb-4">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
            {{ $message }}
            </div>
            @endif
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIM</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($data as $index => $row)
    <tr>
      <th scope="row">{{ $index + $data->firstItem() }}</th>
      <td>{{ $row->nim }}</td>
      <td>{{ $row->nama }}</td>
      <td>{{ $row->alamat }}</td>
      <td>
        <a href="/showdata/{{ $row->id }}" class="btn btn-info">Ubah</a>
        <a href="#" class="btn btn-danger delete" data-nama="{{ $row->nama }}">Hapus</a>
      </td>
    </tr>
    @endforeach

    </tbody>
    </table>
    {{ $data->links() }}
    </div>
  </div>

  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){

      // var mahasiswaid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');

      swal({
        title: "Yakin untuk menghapus data "+nama+"?",
        text: "Anda tidak dapat mengembalikan data ini ketika dihapus.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = "/delete/"+mahasiswaid+""
      swal("Data telah terhapus.", {
        icon: "success",
      });
    } else {
      swal("Data batal dihapus.");
    }
  });
    });
  </script>
</html>
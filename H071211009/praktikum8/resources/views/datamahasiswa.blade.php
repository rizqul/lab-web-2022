<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Data Mahasiswa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="index.css">


	<!-- js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

	<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<h1 class="nav-desc">WELCOME</h1>
		</div>
	</nav>

	<div class="mx-auto">
		<h1 style="padding-top:100px;">
			<center>Data Mahasiswa</center>
		</h1>
		<hr>

		<!-- Button trigger modal -->
		<div id="btn-modal">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
			style="background-color: #fa8256; border-color:#fa8256;">
				Tambah Data Mahasiswa
			</button>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Tambah Data Mahasiswa</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<!-- untuk memasukkan data -->
						<form action="/datamahasiswa/add" method="POST">
							@csrf
							<div class="mb-3 row">
								<label for="nim" class="col-sm-2 col-form-label">NIM</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nim" name="nim" required />
								</div>
							</div>
							<div class="mb-3 row">
								<label for="nama" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nama" name="nama" required />
								</div>
							</div>
							<div class="mb-3 row">
								<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="alamat" name="alamat" value="" required />
								</div>
							</div>
							<div class="mb-3 row">
								<label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="fakultas" name="fakultas" required />
								</div>
							</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:20px;">Close</button>
						<input type="submit" name="simpan" value="Save Data" class="btn submit btn-primary" style="border-radius:30px;" />
					</div>

					</form>

				</div>
			</div>
		</div>

		<!-- untuk mengeluarkan data -->
		<div class="card">
			<div class="card-header text-white">Data Mahasiswa</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">NIM</th>
							<th scope="col">Nama</th>
							<th scope="col">Alamat</th>
							<th scope="col">Fakultas</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@php
						$i = ($data->currentpage()-1)*$data->perpage()+1;

						@endphp
						@foreach($data as $item)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$item->NIM}}</td>
							<td>{{$item->Nama}}</td>
							<td>{{$item->Alamat}}</td>
							<td>{{$item->Fakultas}}</td>
							<td> <a href=/datamahasiswa/edit/{{$item->id}}><button type='button' class='btn btn-warning' style="border-radius:20px;">Edit</button> </a></td>
							<td> <button type='button' class='btn delete btn-secondary' data-id="{{$item->id}}" style="border-radius:20px;">Delete</button></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="pagination justify-content-center">
			{{$data->links()}}
		</div>

	</div>

	@if(session('status'))	<!-- variabel status dr controller -->
	<script>
		swal({
			title: "Berhasil",
			text: "Data Telah Ditambahkan",
			icon: "success",
		});
	</script>
	@endif

</body>

<script>
	$('.delete').click(function() {
		var idMhs = $(this).attr('data-id');
		swal({
			title: "Yakin Ingin Hapus?",
			text: "Dengan menekan tombol OK data akan dihapus",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				window.location = "/datamahasiswa/delete/" + idMhs + ""
				swal("Data Berhasil Dihapus", {
					icon: "success",
				});
			} else {
				swal("Batal Menghapus Data");
			}
		});
	});
</script>

</html>
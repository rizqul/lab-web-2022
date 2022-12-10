<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Permission</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="index.css">


	<!-- js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="#">LARAVEL 2</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="/product">Product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/category">Category</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/seller">Seller</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/permission">Permission</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/seller_permission">Seller Permission</a>
			</li>
			</ul>
		</div>
	</nav>

	<div class="mx-auto">
		<h1 style="padding-top:100px;">
			<center>PERMISSION</center>
		</h1>
		<hr>

		<!-- Button trigger modal -->
		<div id="btn-modal">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
			style="background-color: #a4133c; border-color:#a4133c;">
				Add Permission
			</button>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Add Permission</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<!-- untuk memasukkan data -->
						<form action="/permission/add" method="POST">
							@csrf
							<div class="mb-3 row">
								<label for="name" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" required />
								</div>
							</div>
							<div class="mb-3 row">
								<label for="description" class="col-sm-2 col-form-label">Description</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="description" name="description" value="" required />
								</div>
							</div>
							<div class="mb-3 row">
								<label for="status" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="status" name="status" required />
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
			<div class="card-header text-white">Permissions Data</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>

					<tbody>
						@foreach($data as $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->description}}</td>
							<td>{{$item->status}}</td>
							<td> <button type='button' class='btn delete btn-danger' data-id="{{$item->id}}">Delete</button></td>
							<td>
								<div id="bttn">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $item->id }}"
									style="background-color: #be95c4; border-color:#be95c4;">
										Edit
									</button>
								</div>
							</td>
						</tr>
			
						<!-- Modal -->
						<div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Edit Permission</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">

										<!-- untuk memasukkan data -->
										<form action="/permission/update/{{ $item->id }}" method="POST">
											@csrf
											<div class="mb-3 row">
												<label for="name" class="col-sm-2 col-form-label">Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required />
												</div>
											</div>
											<div class="mb-3 row">
												<label for="description" class="col-sm-2 col-form-label">Description</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="description" name="description" value="{{ $item->description }}" required />
												</div>
											</div>
											<div class="mb-3 row">
												<label for="status" class="col-sm-2 col-form-label">Status</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="status" name="status" value="{{ $item->status }}" required />
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
				window.location = "/permission/delete/" + idMhs + ""
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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Data Mahasiswa</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
			crossorigin="anonymous" />

		<!-- js -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<body>

		<div class="mx-auto" style="width: 1000px;">
            <h1 style="padding-top:50px;"><center>Data Mahasiswa</center></h1>

			<div class="data">
				<div class="card" style="margin-top:50px;">
					<div class="card-header text-white" style="background-color:#fa8256;">Edit Data</div>

					<div class="card-body" style="background-color:#fff1e1;">
						<form action="/datamahasiswa/update/{{$singledata->id}}" method="POST">
							@csrf
							<div class="mb-3 row">
								<label for="nim" class="col-sm-2 col-form-label">NIM</label>
								<div class="col-sm-10">
									<input
										type="text"
										class="form-control"
										id="nim"
										name="nim"
										required
										value="{{$singledata->NIM}}"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="nama" class="col-sm-2 col-form-label">Nama</label>
								<div class="col-sm-10">
									<input
										type="text"
										class="form-control"
										id="nama"
										name="nama"
										required
										value="{{$singledata->Nama}}"f
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
								<div class="col-sm-10">
									<input
										type="text"
										class="form-control"
										id="alamat"
										name="alamat"
										required
										value="{{$singledata->Alamat}}"
									/>
								</div>
							</div>
                            <div class="mb-3 row">
								<label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
								<div class="col-sm-10">
									<input
										type="text"
										class="form-control"
										id="fakultas"
										name="fakultas"
										required
										value="{{$singledata->Fakultas}}"
									/>
								</div>
							</div>
							
							<div class="col-12">
								<input type="submit" name="simpan" value="Simpan Data" class="btn update btn-primary" data-id="{{$singledata->id}}"
								style="border-radius:30px; margin-top:20px; background-color:#fa8256; border-color:#fa8256;"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</body>

</html>
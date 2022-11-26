<?php
	$host       = "localhost:3307";
	$user       = "root";
	$pass       = "";
	$db         = "datamahasiswa" ;

	$koneksi = mysqli_connect($host, $user, $pass, $db);
	if (!$koneksi) {
		die("Tidak bisa terkoneksi ke database"); // gagal konekti = die
	}

	$action1 = mysqli_query($koneksi, 'select * from mahasiswa');

	$nim        = "";
	$nama       = "";
	$alamat     = "";
	$fakultas   = "";
	$sukses     = "";
	$error      = "";

	if (isset($_GET['op'])) {
		$op = $_GET['op'];
	} else {
		$op = "";
	}
	if($op == 'delete'){
		$id         = $_GET['id'];
		$sql1       = "delete from mahasiswa where id = '$id'";
		$q1         = mysqli_query($koneksi,$sql1);
		if($q1){
			$sukses = "Berhasil hapus data";
		}else{
			$error  = "Gagal melakukan delete data";
		}
		header("Refresh:0; url=index.php"); //refresh page stelah simpan data
	}
	if ($op == 'edit') {
		$id         = $_GET['id'];
		$sql1       = "select * from mahasiswa where id = '$id'";
		$q1         = mysqli_query($koneksi, $sql1);
		$r1         = mysqli_fetch_array($q1);
		$nim        = $r1['nim'];
		$nama       = $r1['nama'];
		$alamat     = $r1['alamat'];
		$fakultas   = $r1['fakultas'];

		if ($nim == '') {
			$error = "Data tidak ditemukan";
		}
	}
	if (isset($_POST['simpan'])) { //untuk create
		$nim        = $_POST['nim'];
		$nama       = $_POST['nama'];
		$alamat     = $_POST['alamat'];
		$fakultas   = $_POST['fakultas'];

		if ($nim && $nama && $alamat && $fakultas) {
			if ($op == 'edit') { //untuk update
				$sql1       = "update mahasiswa set nim = '$nim',nama='$nama',alamat = '$alamat',fakultas='$fakultas' where id = '$id'";
				$q1         = mysqli_query($koneksi, $sql1);
				if ($q1) {
					$sukses = "Data berhasil diupdate";
				} else {
					$error  = "Data gagal diupdate";
				}
				header("Refresh:0; url=index.php"); // auto refresh page stelah simpan data
			} else { //untuk insert
				try {
					$sql1   = "insert into mahasiswa(nim,nama,alamat,fakultas) values ('$nim','$nama','$alamat','$fakultas')";
					$q1     = mysqli_query($koneksi, $sql1);
					$sukses     = "Berhasil memasukkan data baru";
				} catch (\Throwable $th) {
					$error      = "Gagal memasukkan data";
				}
				header("Refresh:0; url=index.php"); // auto refresh page stelah simpan data
			}
		} else {
			$error = "Silakan masukkan semua data";
		}
	}
?>


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
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>

	<body style="background-color: rgb(184, 245, 224);">

		<div class="mx-auto">
			<h1 style="padding-top:50px;"><center>Data Mahasiswa</center></h1>
			<!-- untuk memasukkan data -->
			<div class="data">
				<div class="card">
					<div class="card-header text-white">Create / Edit Data</div>
					<div class="card-body">
						<?php
						if ($error){
							echo 
							"<div class='alert alert-danger' role='alert'>
							$error
							</div>";
						} elseif ($sukses) {
							echo 
							"<div class='alert alert-success' role='alert'>
							</div>
							<script>
							console.log ('hello')
							</script>";
						}
						?>

						<form action="" method="POST">
							<div class="mb-3 row">
								<label for="nim" class="col-sm-2 col-form-label">NIM</label>
								<div class="col-sm-10">
									<input
										type="text"
										class="form-control"
										id="nim"
										name="nim"
										value="<?php echo $nim?>"
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
										value="<?php echo $nama?>"
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
										value="<?php echo $alamat?>"
									/>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="fakultas" class="col-sm-2 col-form-label"
									>Fakultas</label
								>
								<div class="col-sm-10">
								<?php echo ($fakultas =='fh') ? 'selected' : '' ?>
									<select class="form-control" name="fakultas" id="fakultas">
										<option value="">- Pilih Fakultas -</option>
										<option <?php echo ($fakultas =='FEB') ? 'selected ' : '' ?>value="FEB">FEB</option> <!-- ternary = if else -->
										<option <?php echo ($fakultas =='FH') ? 'selected' : '' ?> value="FH">FH</option>
										<option <?php echo ($fakultas =='FK') ? 'selected' : '' ?> value="FK">FK</option> <!-- echo = nyetak 1 line makanya harus dipisah pke spasi -->
										<option <?php echo ($fakultas =='SOSPOL') ? 'selected' : '' ?> value="SOSPOL">SOSPOL</option>
										<option <?php echo ($fakultas =='FT') ? 'selected ' : '' ?>value="FT">FT</option>
										<option <?php echo ($fakultas =='FIB') ? 'selected' : '' ?> value="FIB">FIB</option>
										<option <?php echo ($fakultas =='FAPERTA') ? 'selected' : '' ?> value="FAPERTA">FAPERTA</option>
										<option <?php echo ($fakultas =='FMIPA') ? 'selected' : '' ?> value="FMIPA">FMIPA</option>
										<option <?php echo ($fakultas =='FATERNA') ? 'selected' : '' ?> value="FATERNA">FATERNA</option>
										<option <?php echo ($fakultas =='FKG') ? 'selected ' : '' ?>value="FKG">FKG</option>
										<option <?php echo ($fakultas =='FKM') ? 'selected' : '' ?> value="FKM">FKM</option>
										<option <?php echo ($fakultas =='FIKP') ? 'selected' : '' ?> value="FIKP">FIKP</option>
										<option <?php echo ($fakultas =='FF') ? 'selected' : '' ?> value="FF">FF</option>
										<option <?php echo ($fakultas =='FIK') ? 'selected' : '' ?> value="FIK">FIK</option>
										<option <?php echo ($fakultas =='FKehutanan') ? 'selected' : '' ?> value="FKehutanan">FKehutanan</option>
									</select>
								</div>
							</div>
							<div class="col-12">
								<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"/>
							</div>
						</form>
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

							<?php
							$count = 1;
								while ($row = mysqli_fetch_array($action1)) {  //mysqli_query untuk mengubah string dalam () untuk menjadi perintah sql
									echo										//mysqli_fetch_array untuk mengubah hasil dari query menjadi array asosiatif
										"<tr>									
										<td>" . $count."</td>
										<td>" . $row['nim']."</td>
										<td>" . $row['nama']."</td>
										<td>" . $row['alamat']."</td>
										<td>" . $row['fakultas']."</td>
										<td> <a href=?op=edit&id=" . "$row[id] ". "><button type='button' class='btn btn-warning'>Edit</button> </a></td>
										<td> <a href=?op=delete&id=" . "$row[id] ". "><button type='button' class='btn btn-secondary'>Delete</button> </a></td>
										</tr>"; //? = mengirim data ke server
										$count++;
								}
							?>

							</tbody>
						</table>
					</div>
				</div>
				<div>
					<a href="http://localhost/praktikum7/login.php" class="btn btn-danger ms-3" role="button" >LOG OUT</a>
        		</div>
			</div>
		</div>

	</body>
</html>
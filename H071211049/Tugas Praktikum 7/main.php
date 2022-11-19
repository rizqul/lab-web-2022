<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($koneksi);

$servername = "localhost"; 
$username   = "root";
$password   = "";
$database   = "datamahasiswa";
$port       = "3308";

$koneksi = mysqli_connect($servername, $username, $password, $database, $port);

// if ($koneksi) {
//   echo "Koneksi berhasil";
// }

$sql1 = 'SELECT * FROM mahasiswa';
$q1 = mysqli_query($koneksi,$sql1);

$nim      = "";
$nama     = "";
$fakultas = "";
$alamat   = "";
$sukses   = "";
$error    = "";

if(isset($_GET['op'])){
  $op = $_GET['op'];
}else{
  $op = "";
}

if($op == 'delete') {
  $id = $_GET['id'];
  $sql1 = "DELETE FROM mahasiswa WHERE id = '$id'";
  $q1 = mysqli_query($koneksi,$sql1);
  if($q1){
    $sukses = "Data berhasil dihapus";
  }else {
    $error = "Data gagal dihapus";
  }
}

if($op == 'edit'){
  $id       = $_GET['id'];
  $sql1     = "SELECT * FROM mahasiswa WHERE id = '$id'";
  $q1       = mysqli_query($koneksi,$sql1);
  $r1       = mysqli_fetch_array($q1);
  $nim      = $r1['NIM'];
  $nama     = $r1['Nama'];
  $fakultas = $r1['Fakultas'];
  $alamat   = $r1['Alamat'];

  if($nim == ''){
    $error = "Data tidak ditemukan";
  }
}

if (isset($_POST["simpan"])) {
  // var_dump($_POST);

  $nim      = $_POST['nim'];
  $nama     = $_POST['nama'];
  $fakultas = $_POST['fak'];
  $alamat   = $_POST['alamat'];

  if ($nim && $nama && $alamat && $fakultas) {
    if($op == 'edit'){
      $sql1 = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', fakultas = '$fakultas', alamat = '$alamat' WHERE id = '$id'";
      $q1   = mysqli_query($koneksi,$sql1);
      if($q1){
        $sukses = "Data berhasil diperbarui";
      }else {
        $error = "Data gagal diperbarui";
      }
    } else {
      try {
        $sql1 = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama', '$fakultas', '$alamat')";
        $q1 = mysqli_query($koneksi,$sql1);
        $sukses = "Data baru berhasil ditambahkan";

      } catch (\Throwable $th) {
        $error = "Data gagal ditambahkan";
        //throw $th;
      }
    }

  }else{
    $error = "Silakan isi semua data!";
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .mx-auto {
        width: 800px;
      }
      .card {
        margin-top: 10px;
      }
    </style>

<body>
<div class="mx-auto">
  <h1 align="center">Hello, @<?php echo $user_data['username'];?>.</h1>
    <div class="card">
  <div class="card-header">
    Tambah & Ubah Data
  </div>
  <div class="card-body">
    <?php
    if ($error) {
      ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
      </div>
      <?php
      // header("refresh:10;url=main.php");
    }
    ?>

    <?php
        if ($sukses) {
          ?>
          <div class="alert alert-success role="alert">
            <?php echo $sukses ?>
          </div>
          <?php
          // header("refresh:10;url=main.php");
        }
        ?>
    <form action="" method="post">
      <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="fak" class="col-sm-2 col-form-label">Fakultas</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" id="fak" name="fak">
            <option value="">- Pilih Fakultas -</option>
            <option value="Fakultas Matematika dan Ilmu Pengetahuan Alam" <?php if($fakultas == "Fakultas Matematika dan Ilmu Pengetahuan Alam") echo "selected"?>>Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
            <option value="Fakultas Farmasi" <?php if($fakultas == "Fakultas Farmasi") echo "selected"?>>Fakultas Farmasi</option>
            <option value="Fakultas Keperawatan" <?php if($fakultas == "Fakultas Keperawatan") echo "selected"?>>Fakultas Keperawatan</option>
            <option value="Fakultas Ekonomi dan Bisnis" <?php if($fakultas == "Fakultas Ekonomi dan Bisnis") echo "selected"?>>Fakultas Ekonomi dan Bisnis</option>
            <option value="Fakultas Hukum" <?php if($fakultas == "Fakultas Hukum") echo "selected"?>>Fakultas Hukum</option>
            <option value="Fakultas Kedokteran" <?php if($fakultas == "MIPA") echo "selected"?>>Fakultas Kedokteran</option>
            <option value="Fakultas Teknik" <?php if($fakultas == "Fakultas Teknik") echo "selected"?>>Fakultas Teknik</option>
            <option value="Fakultas Ilmu Sosial dan Ilmu Politik" <?php if($fakultas == "Fakultas Ilmu Sosial dan Ilmu Politik") echo "selected"?>>Fakultas Ilmu Sosial dan Ilmu Politik</option>
            <option value="Fakultas Pertanian" <?php if($fakultas == "Fakultas Pertanian") echo "selected"?>>Fakultas Pertanian</option>
            <option value="Fakultas Peternakan" <?php if($fakultas == "Fakultas Peternakan") echo "selected"?>>Fakultas Peternakan</option>
            <option value="Fakultas Kedokteran Gigi" <?php if($fakultas == "Fakultas Kedokteran Gigi") echo "selected"?>>Fakultas Kedokteran Gigi</option>
            <option value="Fakultas Kesehatan Masyarakat" <?php if($fakultas == "Fakultas Kesehatan Masyarakat") echo "selected"?>>Fakultas Kesehatan Masyarakat</option>
            <option value="Fakultas Ilmu Kelautan dan Perikanan" <?php if($fakultas == "Fakultas Ilmu Kelautan dan Perikanan") echo "selected"?>>Fakultas Ilmu Kelautan dan Perikanan</option>
            <option value="Fakultas Kehutanan" <?php if($fakultas == "Fakultas Kehutanan") echo "selected"?>>Fakultas Kehutanan</option>
          </select>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
        </div>
      </div>
      <div class="col-12" align="right">
        <button id='simpan' name="simpan" class="btn btn-primary">Simpan Data</button>
      </div>
    </form>
  </div>
</div>
  <div class="card">
  <div class="card-header text-white bg-dark">
    Data Mahasiswa
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql2  = "SELECT * FROM mahasiswa ORDER BY id DESC";
        $q2    = mysqli_query($koneksi, $sql2);
        $urut  = 1;
        while ($r2  = mysqli_fetch_array($q2)) {
          // foreach ($r2 as $key => $value) {
          //   echo $key . " ". $value. " ";
          // }
          $id       = $r2['id'];
          $nim      = $r2['NIM'];
          $nama     = $r2['Nama'];
          $fakultas = $r2['Fakultas'];
          $alamat   = $r2['Alamat'];
        ?>

          <tr>
          <th scope = "row"> <?php echo $urut++?></th>
          <td scope = "row"> <?php echo $nim?></td>
          <td scope = "row"> <?php echo $nama?></td>
          <td scope = "row"> <?php echo $fakultas?></td>
          <td scope = "row"> <?php echo $alamat?></td>
          <td scope="row">
              <a href="main.php?op=edit&id=<?php echo $id?>">
              <button type="button" class="btn btn-warning">Ubah</button></a>
              <br>
              <a href="main.php?op=delete&id=<?php echo $id?>">
              <button type="button" class="btn btn-danger">Hapus</button></a>
          </td>
          </tr>

          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<div class="mt-4">
  <a href="logout.php">
   <button type="button" class="btn btn-primary">Logout</button>
  </a>
</div>
</div>

</body>
</html>

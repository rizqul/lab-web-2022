
<?php
session_start();
//Panggil Koneksi Database
include "koneksi.php";
//Pakai Session Untuk Kasus ini(Tdk bisa langsung ke data mahasiswa)
if (!isset($_SESSION['submit'])) 
    header("location:index.php")
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa Fasilkom UH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

      <div class="mt-3">
    <h3 class="text-center">Database Fakultas Ilmu Komputer</h3>
    <h3 class="text-center">Universitas Hasanuddin</h3>
    </div>

  <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    Data Mahasiswa
  </div>
  <div class="card-body">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
  Tambah Data
</button>
<a href="logout.php" class="btn btn-danger mb-3 pull-right">logout</a>

  <table class="table table-bordered table-striped table-hover"> 
      <tr>
        <th>No.</th>
        <th>Nim</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>

      <?php
      //Persiapan Menampilkan Data
      $no = 1;
      $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs DESC");
      while($data = mysqli_fetch_array($tampil)) :
    ?>

      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['nim'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td><?= $data['prodi'] ?></td>
        <td>
          <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
          <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
        </td>
        
      </tr>

<!-- Modal Ubah -->
<div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
 <form method="POST" action="aksi_crud.php">
  <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">

  <div class="modal-body">

 <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM Anda">
 </div>

 <div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Lengkap Anda">
 </div>

 <div class="mb-3">
  <label class="form-label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat'] ?></textarea>
 </div>

 <div class="mb-3">
  <label class="form-label">Prodi</label>
  <select class="form-select" name="tprodi">
    <option value="<?= $data['prodi'] ?>"><?= $data['prodi'] ?></option>
    <option value="Sistem Informasi">Sistem Informasi</option>
    <option value="Ilmu Komputer">Ilmu Komputer</option>
    <option value="Teknik Komputer">Teknik Komputer</option>
  </select>
 </div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
</form>
    </div>
  </div>
</div>
<!-- Akhir Modal Ubah -->

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
 <form method="POST" action="aksi_crud.php">
  <input type="hidden" name="id_mhs" value="<?=$data['id_mhs']?>">

  <div class="modal-body">

  <h5 class="text-center"> Apakah Anda Yakin Akan Menghapus Data Ini? <br>
      <span class="text-danger"><?= $data['nim'] ?> - <?= $data['nama'] ?></span>
  </h5>
 

  </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus!</button>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
</form>
    </div>
  </div>
</div>
<!-- Akhir Modal Hapus -->

    <?php endwhile; ?>
</table>



<!-- Modal -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
 <form method="POST" action="aksi_crud.php">
      <div class="modal-body">

 <div class="mb-3">
  <label class="form-label">NIM</label>
  <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM Anda">
 </div>

 <div class="mb-3">
  <label class="form-label">Nama Lengkap</label>
  <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda">
 </div>

 <div class="mb-3">
  <label class="form-label">Alamat</label>
  <textarea class="form-control" name="talamat" rows="3"></textarea>
 </div>

 <div class="mb-3">
  <label class="form-label">Prodi</label>
  <select class="form-select" name="tprodi">
    <option></option>
    <option value="Sistem Informasi">Sistem Informasi</option>
    <option value="Ilmu Komputer">Ilmu Komputer</option>
    <option value="Teknik Komputer">Teknik Komputer</option>
  </select>
 </div>

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>

      </div>
</form>

    </div>
  </div>
</div>
<!-- Akhir Modal -->

  </div>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "magang";
$port   = 3307;

$koneksi    = mysqli_connect($host, $user, $pass, $db, $port);
if (!$koneksi) { 
    die("Can't make a connection to database");
} 
$induk   = "";
$nama    = "";
$alamat  = "";
$divisi  = "";
$sukses  = "";
$error   = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from karyawan where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from karyawan where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $induk      = $r1['no_induk'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $divisi     = $r1['divisi'];

    if ($induk == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $induk      = $_POST['induk'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $divisi     = $_POST['divisi'];

    if ($induk && $nama && $alamat && $divisi) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update karyawan set no_induk = '$induk',nama='$nama',alamat = '$alamat', divisi='$divisi' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into karyawan(no_induk,nama,alamat,divisi) values ('$induk','$nama','$alamat','$divisi')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <h3> <b>Data Karyawan Magang Corpororation.inc</b> </h3>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card border-secondary">
            <div class="card-header">
                <h5> Input Data </h5> 
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>

                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="induk" class="col-sm-2 col-form-label">No. Induk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="induk" name="induk" value=" <?php echo $induk ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="divisi" id="divisi">
                                <option value="">- Pilih Divisi -</option>
                                <option value="Marketing"  <?php if ($divisi == "Marketing") echo "selected" ?>> Marketing</option>
                                <option value="IT"  <?php if ($divisi == "IT") echo "selected" ?>> IT </option>
                                <option value="Design"  <?php if ($divisi == "Design") echo "selected" ?>> Design </option>
                                <option value="Management"  <?php if ($divisi == "Management") echo "selected" ?>> Management </option>
                                <option value="Finance"  <?php if ($divisi == "Finance") echo "selected" ?>> Finance </option>
                                <option value="Partnership"  <?php if ($divisi == "Partnership") echo "selected" ?>> Partnership </option>
                                <option value="HC"  <?php if ($divisi == "HC") echo "selected" ?>> Human Capital </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"> 
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card border-secondary">
            <div class="card-header">
                <h5> Data Karyawan Magang </h5> 
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col">No. Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Divisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from karyawan order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $induk        = $r2['no_induk'];
                            $nama       = $r2['nama'];
                            $alamat     = $r2['alamat'];
                            $divisi   = $r2['divisi'];
                        ?> 
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $induk ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $divisi ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id= <?php echo $id ?>"> 
                                    <button type="button" class="btn btn-warning"> Edit </button></a>
                                    <a href="index.php?op=delete&id= <?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"> 
                                    <button type="button" class="btn btn-danger"> Delete </button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>
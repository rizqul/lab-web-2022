<?php
session_start();
if(isset($_POST['logout'])){
  session_destroy();
  header('location: login.php');
}

//koneksi Database
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "tugas6";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

    if (isset($_POST ["bsave"])) {

        if($_GET['hal'] == "edit"){
            $edit = mysqli_query($koneksi,
            "UPDATE dataproduct 
            set 'nama produk' = '$_POST[tnama]', 
                kategori = '$_POST[tcategory]', 
                harga = '$_POST[tharga]', 
                stok = '$_POST[tstok]'
            WHERE id = '$_GET[id]'");

            if($edit){
                echo "<script> alert('Edit Data Sukses!'); document.location = 'index.php'; </script>";
            }else{
                echo "<script> alert('Edit Data Gagal'); document.location = 'index.php'; </script>";
            }

        }else{
            $simpan = mysqli_query($koneksi,
            "INSERT INTO dataproduct ('nama produk', kategori, harga, stok)
            VALUES ('$_POST[tnama]', '$_POST[tcategory]', '$_POST[tharga]', '$_POST[tstok]')");

            if($simpan){
                echo "<script> alert('Simpan Data Sukses!'); document.location = 'index.php';</script>";
            }else{
                echo "<script> alert('Simpan Data Gagal'); document.location = 'index.php';</script>";
            }
        }


        // /* Start */
        // $nama = $_POST["tnama"];
        // $harga = $_POST["tharga"];
        // $stok = $_POST["tstok"];
        // $category = $_POST["tcategory"];

        // $simpan = mysqli_query($koneksi, "INSERT INTO dataproduct VALUES ('', '$nama', '$category', '$harga', '$stok' )");


        // if ($simpan) {
        //     echo "<script>
        //             alert('Berhasil memasukkan data baru');
        //             document.location='index.php';
        //         </script>";
        // }
        // else {
        //     echo "<script>
        //             alert('Data Gagal dimasukkan');
        //             document.location='index.php';
        //         </script>";
        // }
    }

    if(isset($_GET['hal'])){
        if($_GET['hal'] == "edit"){
            $tampil = mysqli_query($koneksi, "SELECT * from dataproduct where id = '$_GET[id]'");
            $data = mysqli_fetch_array($tampil);
            if($data){
                $vnama = $data['nama produk'];
                $vharga = $data['harga'];
                $vstok = $data['stok'];
                $vkategori = $data['kategori'];
            }
        }else if($_GET['hal'] == "hapus"){
            $hapus = mysqli_query($koneksi, 
            "DELETE FROM dataproduk WHERE id = '$_GET[id]' ");
            if($hapus){
                echo "<script> alert('Hapus Data Sukses!'); document.location = 'index.php';</script>";
            }
        }
    }

    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        $hapus = mysqli_query($koneksi, "DELETE FROM dataproduct WHERE id = '$id'");

        if ($hapus) {
            echo "<script>
                alert('Hapus data sukses!');
                document.location='index.php';
            </script>";
        }
        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TugasPraktikum7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class = "container">
    <br>
    <h2 class="text-center">Data Product</h2>
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Create / Edit Data
    </div>
    <div class="card-body">
        <form method= "post" action="">
            <div class= "form-group my-1">
                <label>Nama produk</label>
                <input type="text" name="tnama" class="form-control" placeholder= "Input nama produk produk disini!" value="<?=@$vnama?>" required>
            </div>
            <div class= "form-group my-1">
                <label>Harga</label>
                <input type="text" name="tharga" class="form-control" placeholder= "Input harga produk disini!" value="<?=@$vharga?>" required>
            </div>
            <div class= "form-group my-1">
                <label>Stok</label>
                <input type="text" name="tstok" class="form-control" placeholder= "Input jumlah stok produk disini!" value="<?=@$vstok?>" required>
            </div>
            <div class= "form-group my-1">
                <label>Kategori</label>
                <select class= "form-control" name="tcategory" placeholder= "Select category product here!" required>
                    <option placeholder= "Select here!"></option>
                    <option value="Makanan" <?= (@$vkategori == 'Makanan') ? 'selected': '' ?> >Makanan</option>
                    <option value="Minuman" <?= (@$vkategori == 'Minuman') ? 'selected': '' ?> >Minuman</option>
                </select>
                <br>
                <button type= "simpan" class="btn btn-primary" name="bsave">Simpan Data</button>
            </div>  
          </form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header bg-secondary text-white">
        Daftar Produk
    </div>
    <div class="card-body">
        <table class = "table table-bordered table-striped">
        <thead>
        <tr>
        <th scope="col">No. </th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Kategori</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col ">Aksi</th>
        </tr>
        </thead>

            <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * from dataproduct");
                        while($data = mysqli_fetch_array($tampil)) :
                    
                    ?>
                    <tr>
                        <td><?=$no++; ?></td>
                        <td><?=$data['nama produk']?></td>
                        <td><?=$data['kategori']?></td>
                        <td><?=$data['harga']?></td>
                        <td><?=$data['stok']?></td>
                        <td>
                            <a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-outline-warning">Edit</a>
                            <a href="index.php?hal=hapus&id=<?=$data['id']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-outline-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile // penutup perulangan while ?>
            

<!-- <button type="button" class="btn btn-outline-warning">Edit</button>
<button type="button" class="btn btn-outline-danger">Delete</button> -->
        </table>
        <form action="" method="post">
            <button type="submit" class="btn btn-danger" name= "logout">Logout</button>
          </form>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
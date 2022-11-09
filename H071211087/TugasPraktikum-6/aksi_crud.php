<?php

//Panggil Koneksi Database
include "koneksi.php";

//Uji jika Tombol Simpan di Klik
if (isset($_POST['bsimpan'])) {

    //Persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
                                      VALUES ('$_POST[tnim]',
                                              '$_POST[tnama]',
                                              '$_POST[talamat]',
                                              '$_POST[tprodi]') ");
    //Jika Simpan Sukses
    if ($simpan) {
        echo "<script>
                alert('Simpan Data Sukses');
                document.location='index.php';
            </script>";
    }else {
        echo "<script>
                alert('Simpan Data Gagal');
                document.location='index.php';
             </script>";
    }
}

//Uji jika Tombol Ubah di Klik
if (isset($_POST['bubah'])) {

    //Persiapan Ubah Data
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET
                                                   nim = '$_POST[tnim]',
                                                   nama = '$_POST[tnama]',
                                                   alamat = '$_POST[talamat]',
                                                   prodi = '$_POST[tprodi]'
                                                WHERE id_mhs = '$_POST[id_mhs]'
                                                   ");


    //Jika Ubah Sukses
    if ($ubah) {
        echo "<script>
                alert('Ubah Data Sukses');
                document.location='index.php';
            </script>";
    }else {
        echo "<script>
                alert('Ubah Data Gagal');
                document.location='index.php';
             </script>";
    }
}

//Uji jika Tombol Hapus di Klik
if (isset($_POST['bhapus'])) {

    //Persiapan Hapus Data
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]' ");


    //Jika Hapus Sukses
    if ($hapus) {
        echo "<script>
                alert('Hapus Data Sukses');
                document.location='index.php';
            </script>";
    }else {
        echo "<script>
                alert('Hapus Data Gagal');
                document.location='index.php';
             </script>";
    }
}
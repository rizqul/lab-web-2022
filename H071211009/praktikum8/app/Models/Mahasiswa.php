<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswas";    // ngikut di tabel
    protected $fillable = ['NIM', 'Nama', 'Alamat', 'Fakultas'];    // sesuaikan kolom di tabel
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class seller extends Model
{
    use HasFactory;
    protected $table = "sellers";    // ngikut di tabel
    protected $fillable = ['name', 'address', 'gender', 'no_hp', 'status'];    // sesuaikan kolom di tabel
}

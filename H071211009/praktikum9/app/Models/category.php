<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class category extends Model
{
    use HasFactory;
    protected $table = "categories";    // ngikut di tabel
    protected $fillable = ['name', 'status'];    // sesuaikan kolom di tabel
}

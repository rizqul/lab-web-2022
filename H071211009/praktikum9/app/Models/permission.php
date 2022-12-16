<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class permission extends Model
{
    use HasFactory;
    protected $table = "permissions";    // ngikut di tabel
    protected $fillable = ['name', 'description', 'status'];    // sesuaikan kolom di tabel
}

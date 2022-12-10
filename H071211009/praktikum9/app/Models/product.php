<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class product extends Model
{
    use HasFactory;
    protected $table = "products";    // ngikut di tabel
    protected $fillable = ['name', 'description', 'status'];    // sesuaikan kolom di tabel

    public function seller(){
        return $this->belongsTo(seller::class);
        
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
}

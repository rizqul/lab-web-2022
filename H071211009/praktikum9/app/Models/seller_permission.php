<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//agar terhubung ke database

class seller_permission extends Model
{
    use HasFactory;
    protected $table = 'sellerpermissions';
    protected $guarded = ['id'];

    public function sellers()
    {
        return $this->belongsToMany(seller::class, 'sellerpermissions', 'permission_id','seller_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(permission::class, 'sellerpermissions', 'seller_id','permission_id');
    }
    
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'gender',
        'no_hp',
        'status',
        'updated_at',
        'created_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->using(SellerPermission::class);
    }
}
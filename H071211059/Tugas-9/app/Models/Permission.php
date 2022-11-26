<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function sellers()
    {
        return $this->belongsToMany(Seller::class)->using(SellerPermission::class);
    }
}
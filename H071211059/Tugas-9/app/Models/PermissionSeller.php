<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionSeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id',
        'permission_id',
        'created_at',
        'updated_at'
    ];

    public $incrementing = true;
}
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

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('D M Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('D M Y');
    }
}

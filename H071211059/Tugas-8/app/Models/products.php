<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName',
        'price',
        'qty',
        'series',
        'description',
        'updated_at',
        'created_at'
    ];

    public function imageSrcs()
    {
        return $this->hasMany(imagesrc::class);
    }
}

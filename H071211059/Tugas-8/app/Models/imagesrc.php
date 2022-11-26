<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagesrc extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'src'
    ];

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}

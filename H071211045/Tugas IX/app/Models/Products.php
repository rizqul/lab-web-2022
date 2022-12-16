<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Date;

class Products extends Model {
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'seller_id',
        'category_id',
        'price',
        'status',
    ];

    public function category() { // Product hasOne Category
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    // Accessor
    public function getCreatedAtAtribute($date) {
        return Date::createFromFormat('Y-m-d H:i:s', $date)->format('D M Y');
    }

    public function getUpdatedAtAtribute($date) {
        return Date::createFromFormat('Y-m-d H:i:s', $date)->format('D M Y');
    }

    // Mutator
    public function setNameAtribute($value) {
        $this->attributes['name'] = strtolower($value);
    }
}

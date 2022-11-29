<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Date;

class Sellers extends Model {
    use HasFactory;

    protected $table = 'sellers';

    protected $fillable = [
        'name',
        'address',
        'gender',
        'phone',
        'status',
    ];

    public function products() { // Seller hasMany Products
        return $this->hasMany(Products::class);
    }

    public function permissions() { // Seller manyToMany seller_Permissions
        return $this->belongsToMany(Permissions::class, 'seller_permissions', 'seller_id', 'permission_id');
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

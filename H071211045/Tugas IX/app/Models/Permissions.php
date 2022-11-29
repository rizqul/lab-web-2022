<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Date;

class Permissions extends Model {
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

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

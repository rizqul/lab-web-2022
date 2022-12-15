<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memberList extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function articles()
    {
        return $this -> hasMany(article::class, 'member_id');
    }
}

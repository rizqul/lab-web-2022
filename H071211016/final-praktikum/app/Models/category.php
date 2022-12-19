<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function articles()
    {
        return $this -> hasMany(article::class);
    }

    // public function getIdAttribute($value)
    // {
    //     $count = DB::table('articles')->where('category_id', $value)->count();
    //     return $count;
    // }
}

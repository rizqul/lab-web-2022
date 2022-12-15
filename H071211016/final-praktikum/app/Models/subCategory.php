<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class subCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';

    public function getCategoryIdAttribute($value)
    {
        $name = DB::table('categories')
        ->select('name')
        ->where('id', $value)
        ->first();

        if(isset($name)){
            foreach ($name as $key => $access) {
                return $access;
            }
        }
        
    }

    public function articles()
    {
        return $this -> hasMany(article::class);
    }

    // public function getIdAttribute($value)
    // {
    //     $count = DB::table('articles')->where('sub_category_id', $value)->count();
    //     return $count;
    // }
}

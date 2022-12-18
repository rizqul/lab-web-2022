<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class articleList extends Model
{
    use HasFactory;
    protected $table = 'articles';

    public function getCategoryIdAttribute($value)
    {
        $data = DB::table('categories')->where('id', $value)->get();
        foreach ($data as $item) {
            return $item->name;
        }
    }
}

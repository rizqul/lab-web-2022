<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class articleTag extends Model
{
    use HasFactory;
    protected $table = 'article_tags';

    public function getTagIdAttribute($value)
    {
        $data = DB::table('tags')->where('id', $value)->get();
        foreach ($data as $item) {
            return $item->name;
        }
        
    }
}

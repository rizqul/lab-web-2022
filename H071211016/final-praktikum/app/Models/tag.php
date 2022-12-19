<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

    public function articles()
    {
        return $this->belongsToMany(article::class, 'article_tags', 'tag_id', 'article_id');
    }

    // public function getIdAttribute($value)
    // {
    //     $count = DB::table('article_tags')->where('tag_id', $value)->count();
    //     return $count;
    // }
}

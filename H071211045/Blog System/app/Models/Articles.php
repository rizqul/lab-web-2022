<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'status',
        'description',
        'visitors',
        'likes',
        'comments',
        'category_id',
        'author_id',
        'content',
    ];

    public function author()
    {
        return $this->belongsTo(Users::class, 'author_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'article_tag', 'article_id', 'tag_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }


}

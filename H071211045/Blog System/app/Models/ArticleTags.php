<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    use HasFactory;

    protected $table = 'article_tag';

    protected $fillable = [
        'article_id',
        'tag_id',
    ];

    public function article()
    {
        return $this->belongsTo(Articles::class, 'article_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }

}

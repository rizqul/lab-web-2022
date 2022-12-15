<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = [
        'tag_name',
        'status',
        'description',
        'article_count',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Users::class, 'author_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('m/d/Y');
    }
}

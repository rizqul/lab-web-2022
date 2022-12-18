<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'article_id',
        'user_id'
    ];

    public function article() {
        return $this->belongsTo(Articles::class);
    }

    public function user() {
        return $this->belongsTo(Users::class);
    }

    
}

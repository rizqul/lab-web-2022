<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'article_id',
        'user_id',
        'content'
    ];

    public function article() {
        return $this->belongsTo(Articles::class);
    }

    public function user() {
        return $this->belongsTo(Users::class);
    }

    
}

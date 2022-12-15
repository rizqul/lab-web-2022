<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    public function categorys()
    {
        return $this -> hasOne(category::class, 'id');
    }

    public function author()
    {
        return $this -> hasOne(User::class, 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}

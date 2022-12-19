<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class userList extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function getIdAttribute($value)
    {
        $count = DB::table('articles')->where('member_id', $value)->count();
        return $count;
    }
}

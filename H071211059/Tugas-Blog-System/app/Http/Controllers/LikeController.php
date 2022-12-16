<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $article_id = $request->input('article_id');
        $user_id = auth()->user()->id;
        $liked =    $request->input('liked');

        // Like::updateOrCreate(
        //     ['user_id' => $user_id, 'article_id' => $article_id],
        //     ['liked' => $liked]
        // );
        if ($liked == 1) {
            Like::create(['user_id' => $user_id, 'article_id' => $article_id, 'liked' => '1']);
        } else {
            Like::where('user_id', $user_id)->where('article_id', $article_id)->delete();
        }

        $total_like = count(Like::where('article_id', $article_id)->where('liked', '1')->get());
        return response()->json(['message' => 'like function ok', 'total_like' => $total_like]);
    }
}
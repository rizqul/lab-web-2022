<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use PDO;
use PHPUnit\Framework\Test;
use Symfony\Polyfill\Intl\Idn\Idn;

class CommentController extends Controller
{
    public function comments(Request $request)
    {
        $article_id = $request->input('id');
        $comments = Comment::where('article_id', $article_id)->orderBy('created_at', 'desc')->get();

        dd($comments);
    }

    public function store(Request $request)
    {
        $article_id = $request->input('id');
        $comment = $request->input('comments');
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;

        if (Comment::create([
            'user_id' => $user_id,
            'comments' => $comment,
            'article_id' => $article_id
        ])) {
            return response()->json(['message' => '200', 'comment' => $comment, 'article_id' => $article_id, 'user_id' => $user_id, 'user_name' => $user_name], 200);
        } else {
            return response()->json(['message' => 'salah bro']);
        }
    }
}
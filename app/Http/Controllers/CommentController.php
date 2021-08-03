<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * コメント追加処理
     *
     * @param Request formから渡されたデータ
     * @param Post 更新するDB route()の第二引数で渡したもの
     */
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('posts.show', $post);
    }


    /**
     * コメント削除
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $comment->post);
    }
}

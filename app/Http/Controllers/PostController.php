<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    // 一覧表示
    public function index()
    {
        // 以下３つは同じ意味
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get();

        return view('index')
            -> with(['posts' => $posts]);
    }


    /**
     * 詳細画面へ遷移
     *
     * @param viewから渡ってきたidのpostデータ
     *
     * Implicit Binding
     */
    // public function show($id)
    public function show(Post $post)
    {
        // $post = Post::find($id);

        // 存在しないidの場合はエラー画面遷移
        // $post = Post::findOrFail($id);

        // $post = $post->comments()->latest()->get();

        return view('posts.show')
            -> with(['post' => $post]);
    }


    public function create()
    {
        return view('posts.create');
    }


    /**
     * DBに追加処理
     * @param Request $request formからpostで送信されたデータ
     */
    public function store (PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index');
    }


    // 編集機能
    // Implicit Binding
    public function edit(Post $post)
    {
        return view('posts.edit')
            -> with(['post' => $post]);
    }



    /**
     * DBに更新処理
     * @param Request $request formからpostで送信されたデータ
     * @param Post $post 更新するDBクラス　route()の第二引数で渡したもの
     */
    public function update (PostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post);
    }


    /**
     * 削除処理
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}

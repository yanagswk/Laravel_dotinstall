<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post -> posts
class Post extends Model
{
    use HasFactory;

    // 設定するカラムを指定
    protected $fillable = [
        'title',
        'body'
    ];


    /**
     * commentモデルとのリレーションを設定する
     * 主キー: Post
     * 外部キー: Comment
     *
     * viewで$post->commentとすると参照できるようになる
     *
     * $postに関連するcommentを取得できるようにする
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);   // Commentクラスはnamespaceが同じなので直接指定できる。
    }
}

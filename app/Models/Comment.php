<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body'
    ];


    /**
     * Postモデルとのリレーションを設定する
     * 主キー: Post
     * 外部キー: Comment
     *
     * viewで$comment->postとすると参照できるようになる
     */
    public function post()
    {
        return $this->belongsTo(Post::class);   // Commentクラスはnamespaceが同じなので直接指定できる。
    }
}

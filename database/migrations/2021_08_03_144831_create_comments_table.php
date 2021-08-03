<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     * commentsテーブル作成
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');      // postsテーブルのidカラムに紐づく
            $table->string('body');
            $table->timestamps();
            $table
                ->foreign('post_id')        // post_idに外部キー設定
                ->references('id')          //
                ->on('posts')               // postsテーブルのidに紐づける
                ->onDelete('cascade');      // postsテーブルでレコードが削除されたら、関連するコメントも削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

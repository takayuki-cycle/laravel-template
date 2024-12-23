<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
  /**
   * Run the migrations.
   * このメソッドはテーブルのスキーマを定義します。
   */
  public function up(): void
  {
    Schema::create('todos', function (Blueprint $table) {
      $table->id(); // 自動インクリメントのID
      $table->string('title'); // タスクのタイトル
      $table->boolean('completed')->default(false); // 完了状態 (デフォルトは未完了)
      $table->timestamps(); // 作成日・更新日
    });
  }

  /**
   * Reverse the migrations.
   * このメソッドはテーブルを削除します。
   */
  public function down(): void
  {
    Schema::dropIfExists('todos');
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  use HasFactory;

  // データベーステーブルの関連付け
  protected $table = 'todos';

  // タイトルと完了状態を変更可能にする
  protected $fillable = ['title', 'completed'];
}

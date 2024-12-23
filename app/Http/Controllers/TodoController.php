<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
  /**
   * タスク一覧を取得
   */
  public function index()
  {
    // 全てのタスクを取得し、JSONで返す
    return response()->json(Todo::all());
  }

  /**
   * 新しいタスクを作成
   */
  public function store(Request $request)
  {
    // バリデーションの実施
    $validated = $request->validate([
      'title' => 'required|string|max:255', // 必須、文字列、最大255文字
    ]);

    // タスクを作成
    $todo = Todo::create($validated);

    // 作成されたタスクを返す
    return response()->json($todo, 201);
  }

  /**
   * 特定のタスクを取得
   */
  public function show($id)
  {
    // 指定されたIDのタスクを取得
    $todo = Todo::find($id);

    // タスクが見つからない場合は404を返す
    if (!$todo) {
      return response()->json(['message' => 'Todo not found'], 404);
    }

    return response()->json($todo);
  }

  /**
   * タスクを更新
   */
  public function update(Request $request, $id)
  {
    // 指定されたIDのタスクを取得
    $todo = Todo::find($id);

    // タスクが見つからない場合は404を返す
    if (!$todo) {
      return response()->json(['message' => 'Todo not found'], 404);
    }

    // バリデーションと更新
    $validated = $request->validate([
      'title' => 'string|max:255',
      'completed' => 'boolean',
    ]);

    $todo->update($validated);

    return response()->json($todo);
  }

  /**
   * タスクを削除
   */
  public function destroy($id)
  {
    // 指定されたIDのタスクを取得
    $todo = Todo::find($id);

    // タスクが見つからない場合は404を返す
    if (!$todo) {
      return response()->json(['message' => 'Todo not found'], 404);
    }

    // タスクを削除
    $todo->delete();

    return response()->json(['message' => 'Todo deleted successfully']);
  }
}
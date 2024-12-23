<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
  return $request->user();
});

// タスク管理のAPIエンドポイント
Route::get('/todos', [TodoController::class, 'index']); // タスク一覧取得
Route::post('/todos', [TodoController::class, 'store']); // タスク作成
Route::get('/todos/{id}', [TodoController::class, 'show']); // 特定タスク取得
Route::put('/todos/{id}', [TodoController::class, 'update']); // タスク更新
Route::delete('/todos/{id}', [TodoController::class, 'destroy']); // タスク削除
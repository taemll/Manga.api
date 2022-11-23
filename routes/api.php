<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TypeController;

Route::get('manga', [MangaController::class, 'show']);
Route::post('manga', [MangaController::class, 'create']);
Route::put('manga/{id}', [MangaController::class, 'update']);
Route::delete('manga/{id}', [MangaController::class, 'delete']);

Route::get('author', [AuthorController::class, 'show']);
Route::post('author', [AuthorController::class, 'create']);
Route::put('author/{id}', [AuthorController::class, 'update']);
Route::delete('author/{id}', [AuthorController::class, 'delete']);

Route::get('genre', [GenreController::class, 'show']);
Route::post('genre', [GenreController::class, 'create']);
Route::put('genre/{id}', [GenreController::class, 'update']);
Route::delete('genre/{id}', [GenreController::class, 'delete']);

Route::get('publisher', [PublisherController::class, 'show']);
Route::post('publisher', [PublisherController::class, 'create']);
Route::put('publisher/{id}', [PublisherController::class, 'update']);
Route::delete('publisher/{id}', [PublisherController::class, 'delete']);

Route::get('type', [TypeController::class, 'show']);
Route::post('type', [TypeController::class, 'create']);
Route::put('type/{id}', [TypeController::class, 'update']);
Route::delete('type/{id}', [TypeController::class, 'delete']);

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

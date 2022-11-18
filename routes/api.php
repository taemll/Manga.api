<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\TypeController;

Route::get('showmanga', [MangaController::class, 'show']);
Route::post('createmanga', [MangaController::class, 'create']);
Route::put('updatemanga/{id}', [MangaController::class, 'update']);
Route::delete('deletemanga/{id}', [MangaController::class, 'delete']);

Route::get('showAuthor', [AuthorController::class, 'show']);
Route::post('createAuthor', [AuthorController::class, 'create']);
Route::put('updateAuthor/{id}', [AuthorController::class, 'update']);
Route::delete('deleteAuthor/{id}', [AuthorController::class, 'delete']);

Route::get('showGenre', [GenreController::class, 'show']);
Route::post('createGenre', [GenreController::class, 'create']);
Route::put('updateGenre/{id}', [GenreController::class, 'update']);
Route::delete('deleteGenre/{id}', [GenreController::class, 'delete']);

Route::get('showPublisher', [PublisherController::class, 'show']);
Route::post('createPublisher', [PublisherController::class, 'create']);
Route::put('updatePublisher/{id}', [PublisherController::class, 'update']);
Route::delete('deletePublisher/{id}', [PublisherController::class, 'delete']);

Route::get('showType', [TypeController::class, 'show']);
Route::post('createType', [TypeController::class, 'create']);
Route::put('updateType/{id}', [TypeController::class, 'update']);
Route::delete('deleteType/{id}', [TypeController::class, 'delete']);

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

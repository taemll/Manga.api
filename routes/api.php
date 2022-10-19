<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\AuthorController;

Route::get('showmanga', [MangaController::class, 'show']);
Route::post('createmanga', [MangaController::class, 'create']);
Route::put('updatemanga/{id}', [MangaController::class, 'update']);
Route::delete('deletemanga/{id}', [MangaController::class, 'show']);

Route::get('showAuthor', [AuthorController::class, 'show']);
Route::post('createAuthor', [AuthorController::class, 'create']);
Route::put('updateAuthor/{id}', [AuthorController::class, 'update']);
Route::delete('deleteAuthor/{id}', [AuthorController::class, 'show']);


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

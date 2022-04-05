<?php

use App\Http\Controllers\BookControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\BookController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/ping', function(){
    return [
        'pong' => true
    ];
});

// CRUD da Biblioteca

// Create = método para criar uma tarefa
// Read = métodos para ler uma ou mais tarefas
// Update = métodos para atualizar uma tarefa
// Delte = método para deletar uma tarefa

// POST /livro = Inserir um livro no sistema
// GET /livros = Ler um livro no sistema
// GET /livro/2 = Ler um livro específico do sistema
// PUT /livro/2 = Atualizar um livro no sistema
// DELETE /livro/2 = Deletar um livro do sistema

Route::post('/livro', [BookControler::class, 'createBook']);
Route::get('/livros', [BookControler::class, 'readAllBooks']);
Route::get('/livro/{id}', [BookControler::class, 'readBook']);
Route::put('/livro/{id}',[BookControler::class, 'updateBook']);
Route::delete('/livro/{id}', [BookControler::class, 'deleteBook']);



//Route::get('/book', [BookController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Rota para exibir a listagem de tarefas. GET /tarefas
Route::get('/tarefas', [TaskController::class, 'index'])
     ->name('tarefas.index'); // Nome da rota para facilitar referências em views e redirects

// Rota para exibir o formulário de criação de uma nova tarefa. GET /tarefas/create
Route::get('/tarefas/create', [TaskController::class, 'create'])
     ->name('tarefas.create'); // Nome da rota para facilitar referências em views e redirects

// Rota para armazenar uma nova tarefa no array de tarefas. POST /tarefas
Route::post('/tarefas', [TaskController::class, 'store'])
     ->name('tarefas.store'); // Nome da rota para facilitar referências em views e redirects

// Rota para exibir uma única tarefa. GET /tarefas/{id}
Route::get('/tarefas/{id}', [TaskController::class, 'show'])
     ->name('tarefas.show') // Nome da rota para facilitar referências em views e redirects
     ->where('id', '[0-9]+'); // Restrição de expressão regular para o parâmetro 'id'

// Rota para exibir o formulário de edição de uma tarefa existente. GET /tarefas/{id}/edit
Route::get('/tarefas/{id}/edit', [TaskController::class, 'edit'])
     ->name('tarefas.edit') // Nome da rota para facilitar referências em views e redirects
     ->where('id', '[0-9]+'); // Restrição de expressão regular para o parâmetro 'id'

// Rota para atualizar uma tarefa existente. PUT /tarefas/{id}
Route::put('/tarefas/{id}', [TaskController::class, 'update'])
     ->name('tarefas.update') // Nome da rota para facilitar referências em views e redirects
     ->where('id', '[0-9]+'); // Restrição de expressão regular para o parâmetro 'id'

// Rota para excluir uma tarefa. DELETE /tarefas/{id}
Route::delete('/tarefas/{id}', [TaskController::class, 'destroy'])
     ->name('tarefas.destroy') // Nome da rota para facilitar referências em views e redirects
     ->where('id', '[0-9]+'); // Restrição de expressão regular para o parâmetro 'id'



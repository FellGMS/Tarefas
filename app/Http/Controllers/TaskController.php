<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    // Inicialização do array de tarefas estático.
    private static $tasks = [
        ['id' => 1, 'Tarefa' => 'Aprender Laravel'],
        ['id' => 2, 'Tarefa' => 'Construir um CRUD'],
        ['id' => 3, 'Tarefa' => 'Subir o projeto no Git'],
        ['id' => 4, 'Tarefa' => 'Implementar autenticação de usuários'],
        ['id' => 5, 'Tarefa' => 'Criar testes automatizados'],
        ['id' => 6, 'Tarefa' => 'Estudar Eloquent ORM'],
        ['id' => 7, 'Tarefa' => 'Aplicar middleware para controle de acesso'],
        ['id' => 8, 'Tarefa' => 'Configurar envio de e-mails'],
        ['id' => 9, 'Tarefa' => 'Adicionar sistema de log'],
        ['id' => 10, 'Tarefa' => 'Deploy do projeto em ambiente de produção'],
    ];


    //Alteração no método index no TaskController para retornar a view tasks com os dados das tarefas.
    public function index()
    {
        // Recupera tarefas da sessão ou usa o array estático se a sessão estiver vazia.
        $tasks = Session::get('tasks', self::$tasks);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        // Exibe a view para criar uma nova tarefa.
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Recupera tarefas da sessão ou usa o array estático se a sessão estiver vazia.
        $tasks = Session::get('tasks', self::$tasks);
        $newId = end($tasks)['id'] + 1; // Calcula o próximo ID.

        // Adiciona a nova tarefa ao array.
        $tasks[] = [
            'id' => $newId,
            'Tarefa' => $request->input('Tarefa'),
        ];

        // Atualiza a sessão com o novo conjunto de tarefas.
        Session::put('tasks', $tasks);

        // Redireciona para a página de listagem de tarefas.
        return redirect('/tarefas');
    }

    public function show($id)
    {
        // Recupera tarefas da sessão.
        $tasks = Session::get('tasks', self::$tasks);
        $task = $this->findTask($id, $tasks);

        if ($task) {
            // Exibe os detalhes de uma tarefa específica.
            return view('tasks.show', ['task' => $task]);
        } else {
            // Retorna um erro 404 se a tarefa não for encontrada.
            abort(404);
        }
    }

    public function edit($id)
    {
        // Recupera tarefas da sessão.
        $tasks = Session::get('tasks', self::$tasks);
        $task = $this->findTask($id, $tasks);

        if ($task) {
            // Exibe a view para editar uma tarefa existente.
            return view('tasks.edit', ['task' => $task]);
        } else {
            // Retorna um erro 404 se a tarefa não for encontrada.
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        // Recupera tarefas da sessão.
        $tasks = Session::get('tasks', self::$tasks);

        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                // Atualiza a tarefa com os novos dados do request.
                $task['Tarefa'] = $request->input('Tarefa');
                break;
            }
        }

        // Atualiza a sessão com o novo conjunto de tarefas.
        Session::put('tasks', $tasks);

        // Redireciona para a página de listagem de tarefas.
        return redirect('/tarefas');
    }

    public function destroy($id)
    {
        // Recupera tarefas da sessão.
        $tasks = Session::get('tasks', self::$tasks);

        // Remove a tarefa do array.
        foreach ($tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset($tasks[$key]);
                break;
            }
        }

        // Reindexa o array e atualiza a sessão.
        $tasks = array_values($tasks);
        Session::put('tasks', $tasks);

        // Redireciona para a página de listagem de tarefas.
        return redirect('/tarefas');
    }

    // Método auxiliar privado para encontrar uma tarefa pelo ID.
    private function findTask($id, $tasks)
    {
        foreach ($tasks as $task) {
            if ($task['id'] == $id) {
                return $task;
            }
        }
        return null;
    }
}

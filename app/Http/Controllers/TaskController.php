<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
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


    public function index()
    {
        return response()->json(self::$tasks);
    }

    public function store(Request $request)
    {
        $newTask = [
            'id' => end(self::$tasks)['id'] + 1, // Pega o id do último item e adiciona 1
            'name' => $request->name,
        ];
        self::$tasks[] = $newTask;
        return response()->json($newTask, 201);
    }

    public function show($id)
    {
        foreach (self::$tasks as $task) {
            if ($task['id'] == $id) {
                return response()->json($task);
            }
        }
        return response()->json(['message' => 'Tarefa não encontrada'], 404);
    }

    public function update(Request $request, $id)
    {
        foreach (self::$tasks as &$task) {
            if ($task['id'] == $id) {
                $task['name'] = $request->name;
                return response()->json($task);
            }
        }
        return response()->json(['message' => 'Tarefa não encontrada'], 404);
    }

    public function destroy($id)
    {
        foreach (self::$tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset(self::$tasks[$key]);
                self::$tasks = array_values(self::$tasks); // Reindexa o array após a remoção
                return response()->json(['message' => 'Registro deletado com sucesso']);
            }
        }
        return response()->json(['message' => 'Tarefa não encontrada'], 404);
    }
}

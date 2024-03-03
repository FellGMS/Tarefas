<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private static $tasks = [
        ['id' => 1, 'name' => 'Aprender Laravel'],
        ['id' => 2, 'name' => 'Construir um CRUD'],
        // Mais tarefas aqui...
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
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function update(Request $request, $id)
    {
        foreach (self::$tasks as &$task) {
            if ($task['id'] == $id) {
                $task['name'] = $request->name;
                return response()->json($task);
            }
        }
        return response()->json(['message' => 'Task not found'], 404);
    }

    public function destroy($id)
    {
        foreach (self::$tasks as $key => $task) {
            if ($task['id'] == $id) {
                unset(self::$tasks[$key]);
                self::$tasks = array_values(self::$tasks); // Reindexa o array após a remoção
                return response()->json(['message' => 'Task deleted successfully']);
            }
        }
        return response()->json(['message' => 'Task not found'], 404);
    }
}

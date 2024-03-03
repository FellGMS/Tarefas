<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private static $tasks = [
        ['id' => 1, 'name' => 'Aprender Laravel'],
        // Mais tarefas aqui...
    ];

    public function index()
    {
        return response()->json(self::$tasks);
    }

    public function store(Request $request)
    {
        $newTask = [
            'id' => count(self::$tasks) + 1,
            'name' => $request->name,
        ];
        self::$tasks[] = $newTask;
        return response()->json($newTask);
    }

    // Implementar os métodos show, update, destroy...
}

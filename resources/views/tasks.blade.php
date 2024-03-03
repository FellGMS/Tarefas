<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tarefas</h1>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task['Tarefa'] }}</li>
            @endforeach
        </ul>
    </div>
@endsection

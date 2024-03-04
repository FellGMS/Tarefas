{{-- resources/views/tasks/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Tarefas</h1>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task['Tarefa'] }}</li>
                {{-- Links para show, edit, delete aqui --}}
            @endforeach
        </ul>
    </div>
@endsection

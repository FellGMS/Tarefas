<!-- Herda o layout base -->
@extends('layouts.app')

<!-- Conteúdo específico da página -->
@section('content')
<div class="container">
    <h1>Listagem de Tarefas</h1>
    <a href="/tarefas/create">Adicionar Nova Tarefa</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task['Tarefa'] }}
                <a href="/tarefas/{{ $task['id'] }}">Ver</a>
                <a href="/tarefas/{{ $task['id'] }}/edit">Editar</a>
                <form action="/tarefas/{{ $task['id'] }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Deletar</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection

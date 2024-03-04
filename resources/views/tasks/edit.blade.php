@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tarefa</h1>

    <form action="{{ url('/tarefas/' . $task['id']) }}" method="POST">

        @method('PUT')
        @csrf
        <input type="text" name="Tarefa" value="{{ $task['Tarefa'] }}" required>

        <button type="submit">Atualizar</button>
    </form>
</div>
@endsection

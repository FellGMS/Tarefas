@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Tarefa</h1>
    <form action="{{ url('/tarefas') }}" method="POST">

        @csrf
        <input type="text" name="Tarefa" placeholder="Nome da tarefa" required>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection

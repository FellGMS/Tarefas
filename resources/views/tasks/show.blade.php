@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Tarefa</h1>
    <p>ID: {{ $task['id'] }}</p>
    <p>Tarefa: {{ $task['Tarefa'] }}</p>
</div>
@endsection

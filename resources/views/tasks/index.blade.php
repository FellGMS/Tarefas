@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Lista de Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-2">Adicionar Nova Tarefa</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tarefa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task['id'] }}</td>
                    <td>{{ $task['Tarefa'] }}</td>
                    <td>
                        <a href="{{ route('tarefas.edit', $task['id']) }}" class="btn btn-sm btn-info">Editar</a>

                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#viewTaskModal{{ $task['id'] }}">
                            Detalhes
                        </button>

                        <form action="{{ route('tarefas.destroy', $task['id']) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal para visualizar detalhes da tarefa -->
                <div class="modal fade" id="viewTaskModal{{ $task['id'] }}" tabindex="-1" role="dialog" aria-labelledby="viewTaskModalLabel{{ $task['id'] }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewTaskModalLabel{{ $task['id'] }}">Detalhes da Tarefa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID:</strong> {{ $task['id'] }}</p>
                                <p><strong>Tarefa:</strong> {{ $task['Tarefa'] }}</p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection

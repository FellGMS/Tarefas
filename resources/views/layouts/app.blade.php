<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação Tarefas</title>
    <!-- CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Opcional: incluir ícones do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app" class="py-4">
        @yield('content')
    </div>

    <!-- Scripts necessários para o Bootstrap -->
    <!-- jQuery versão completa, necessário para funcionalidades do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Popper.js, necessário para tooltips e popovers do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>

    <!-- JavaScript do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Scripts adicionais da página -->
        @yield('scripts')
</body>
</html>

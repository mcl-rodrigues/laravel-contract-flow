<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestão de contratos e serviços</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <nav class="bg-gray-800 text-white px-6 py-4">
            <div class="max-w-7xl mx-auto flex gap-6">
                <a href="/">Dashboard</a>
                <a href="/contratos">Contratos</a>
                <a href="/servicos">Serviços</a>
                <a href="/clientes">Clientes</a>
            </div>
        </nav>
        <main class="max-w-7xl mx-auto p-6">
            @yield('content')
        </main>
        @hasSection('javascript')
            @yield('javascript')
        @endif
    </body>
</html>

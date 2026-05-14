<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Gestão de contratos e serviços</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <nav class="bg-gray-800 text-white px-6 py-4">
            <div class="max-w-7xl mx-auto flex gap-6">
                <a href="/" class="{{ request()->is('/') ? 'text-yellow-400 font-semibold' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'text-yellow-400 font-semibold' : '' }}">
                    Clientes
                </a>
                <a href="{{ route('servicos.index') }}" class="{{ request()->routeIs('servicos.*') ? 'text-yellow-400 font-semibold' : '' }}">
                    Serviços
                </a>
                <a href="{{ route('contratos.index') }}" class="{{ request()->routeIs('contratos.*') ? 'text-yellow-400 font-semibold' : '' }}">
                    Contratos
                </a>
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

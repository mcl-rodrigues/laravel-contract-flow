@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">
                Dashboard
            </h1>
            <p class="mt-1 text-gray-600">
                Gestão de contratos e serviços
            </p>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <a
                href="{{ route('clientes.index') }}"
                class="group rounded-xl bg-blue-600 p-6 text-white shadow transition hover:-translate-y-1 hover:bg-blue-700"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-100">
                            Clientes
                        </p>
                        <h2 class="mt-4 text-4xl font-bold">
                            {{ $totalClientes }}
                        </h2>
                        <p class="mt-2 text-sm text-blue-100">
                            Clientes cadastrados
                        </p>
                    </div>
                    <div class="rounded-lg bg-white/10 p-3">
                        <x-heroicon-o-users class="h-8 w-8" />
                    </div>
                </div>
            </a>
            <a
                href="{{ route('servicos.index') }}"
                class="group rounded-xl bg-purple-600 p-6 text-white shadow transition hover:-translate-y-1 hover:bg-purple-700"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-100">
                            Serviços
                        </p>
                        <h2 class="mt-4 text-4xl font-bold">
                            {{ $totalServicos }}
                        </h2>
                        <p class="mt-2 text-sm text-purple-100">
                            Serviços disponíveis
                        </p>
                    </div>
                    <div class="rounded-lg bg-white/10 p-3">
                        <x-heroicon-o-wrench-screwdriver class="h-8 w-8" />
                    </div>
                </div>
            </a>
            <a
                href="{{ route('contratos.index') }}"
                class="group rounded-xl bg-green-600 p-6 text-white shadow transition hover:-translate-y-1 hover:bg-green-700"
            >
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-100">
                            Contratos
                        </p>
                        <h2 class="mt-4 text-4xl font-bold">
                            {{ $totalContratos }}
                        </h2>
                        <p class="mt-2 text-sm text-green-100">
                            Contratos cadastrados
                        </p>
                    </div>
                    <div class="rounded-lg bg-white/10 p-3">
                        <x-heroicon-o-document-text class="h-8 w-8" />
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection

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
            <div class="rounded-lg bg-white p-6 shadow">
                <h2 class="text-sm font-medium text-gray-500">
                    Clientes
                </h2>
            </div>
        </div>
    </div>
@endsection

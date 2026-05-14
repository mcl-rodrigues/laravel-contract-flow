@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Novo Contrato
            </h1>
        </div>

        <div class="rounded-lg bg-white p-6 shadow">
            <div id="app">
                <contrato-form
                    :clientes='@json($clientes)'
                    action="{{ route('contratos.store') }}"
                />
            </div>
        </div>
    </div>
@endsection

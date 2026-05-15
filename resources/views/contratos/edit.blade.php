@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Editar Contrato
            </h1>
        </div>

        <div class="rounded-lg bg-white p-6 shadow">
            <div id="app">
                <contrato-form
                    :clientes='@json($clientes)'
                    :servicos='@json($servicos)'
                    :contrato='@json($contrato)'
                    action="{{ route('contratos.update', $contrato) }}"
                />
            </div>
        </div>
    </div>
@endsection

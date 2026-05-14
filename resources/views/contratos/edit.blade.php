@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Editar Contrato
            </h1>
        </div>
        <div class="rounded-lg bg-white p-6 shadow">
            <form action="{{ route('contratos.update', $contrato->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Cliente
                    </label>
                    <input
                        type="text"
                        value="{{ $contrato->cliente->nome }}"
                        disabled
                        class="w-full rounded border border-gray-300 px-4 py-2 bg-gray-100"
                    >
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Data de Início
                    </label>
                    <input
                        type="date"
                        name="data_inicio"
                        value="{{ old('data_inicio', $contrato->data_inicio) }}"
                        required
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('data_inicio') ? 'border-red-500 focus:border-red-500' : 'focus:border-blue-500' }}"
                    >
                    @error('data_inicio')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Data de Fim
                    </label>
                    <input
                        type="date"
                        name="data_fim"
                        value="{{ old('data_fim', $contrato->data_fim) }}"
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('data_fim') ? 'border-red-500 focus:border-red-500' : 'focus:border-blue-500' }}"
                    >
                    @error('data_fim')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Status
                    </label>
                    <select
                        name="status"
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('status') ? 'border-red-500 focus:border-red-500' : 'focus:border-blue-500' }}"
                    >
                        <option value="1" {{ old('status', $contrato->status) == '1' ? 'selected' : '' }}>
                            Ativo
                        </option>
                        <option value="0" {{ old('status', $contrato->status) == '0' ? 'selected' : '' }}>
                            Inativo
                        </option>
                    </select>
                    @error('status')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <a
                        href="{{ route('contratos.index') }}"
                        class="rounded bg-gray-300 px-4 py-2 text-gray-800 hover:bg-gray-400"
                    >
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
                    >
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Editar Cliente
            </h1>
        </div>
        <div class="rounded-lg bg-white p-6 shadow">
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Nome
                    </label>
                    <input
                        type="text"
                        name="nome"
                        value="{{ old('nome', $cliente->nome) }}"
                        required
                        minlength="3"
                        maxlength="50"
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('nome') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500' }}"
                    >
                    @error('nome')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Documento
                    </label>
                    <input
                        type="text"
                        name="documento"
                        value="{{ old('documento', $cliente->documento) }}"
                        required
                        minlength="11"
                        maxlength="14"
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('documento') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500' }}"
                    >
                    @error('documento')
                        <div class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $cliente->email) }}"
                        required
                        maxlength="50"
                        class="w-full rounded border border-gray-300 px-4 py-2 focus:border-blue-500 focus:outline-none
                        {{ $errors->has('email') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500' }}"
                    >
                    @error('email')
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
                        {{ $errors->has('status') ? 'border-red-500 focus:border-red-500' : 'border-gray-300 focus:border-blue-500' }}"
                    >
                        <option value="1" {{ old('status', $cliente->status) == '1' ? 'selected' : '' }}>
                            Ativo
                        </option>
                        <option value="0" {{ old('status', $cliente->status) == '0' ? 'selected' : '' }}>
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
                        href="{{ route('clientes.index') }}"
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

@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Serviços
            </h1>
            <a href="{{ route('servicos.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Novo Serviço
            </a>
        </div>
        <div class="overflow-hidden rounded-lg bg-white shadow">
            @if (session('success'))
                <div class="rounded bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="rounded bg-red-100 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif
            <table class="min-w-full [&_tbody_tr:hover]:bg-gray-50">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            ID
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Nome
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Valor Base
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicos as $servico)
                        <tr class="border-t">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $servico->id }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $servico->nome }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $servico->valor_base }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a
                                        href="{{ route('servicos.edit', $servico->id) }}"
                                        class="rounded bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600"
                                    >
                                        Editar
                                    </a>
                                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Sem serviços cadastrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $servicos->links() }}
            </div>
        </div>
    </div>
@endsection

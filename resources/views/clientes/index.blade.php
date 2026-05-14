@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Clientes
            </h1>
            <a href="{{ '#' }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Novo Cliente
            </a>
        </div>
        <div class="overflow-hidden rounded-lg bg-white shadow">
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
                            Tipo Pessoa
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Documento
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Email
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Status
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $cliente)
                        <tr class="border-t">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $cliente->id }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $cliente->nome }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ strlen($cliente->documento) === 11 ? 'PF' : 'PJ' }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $cliente->documento }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $cliente->email }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($cliente->status)
                                    <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        Ativo
                                    </span>
                                @else
                                    <span class="rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                        Inativo
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a
                                        href="#"
                                        class="rounded bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600"
                                    >
                                        Editar
                                    </a>
                                    <button
                                        class="rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700"
                                    >
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Sem clientes cadastrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
@endsection

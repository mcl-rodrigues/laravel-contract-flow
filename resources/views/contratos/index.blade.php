@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">
                Contratos
            </h1>
            <a href="{{ route('contratos.create') }}" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Novo Contrato
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
                            Cliente
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Data de Início
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Data de Fim
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Status
                        </th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                            Valor Total
                        </th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contratos as $contrato)
                        <tr class="border-t">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $contrato->id }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $contrato->cliente->nome }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($contrato->data_inicio)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $contrato->data_fim ? \Carbon\Carbon::parse($contrato->data_fim)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($contrato->status === 'ativo')
                                    <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                        Ativo
                                    </span>
                                @else
                                    <span class="rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                        Cancelado
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">
                                R$ {{ number_format($contrato->valor_total, 2, ',', '.') }}
                                @if ($contrato->calcularDesconto() > 0)
                                    <div class="mt-1 text-xs font-medium text-green-600">
                                        Desconto de 10% aplicado
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <button
                                        type="button"
                                        onclick="
                                            const content = document.getElementById('content-{{ $contrato->id }}');
                                            const text = document.getElementById('toggle-text-{{ $contrato->id }}');

                                            if (content.classList.contains('max-h-0')) {
                                                content.classList.remove('max-h-0');
                                                content.classList.add('max-h-[500px]');

                                                text.innerText = 'Recolher';
                                            } else {
                                                content.classList.remove('max-h-[500px]');
                                                content.classList.add('max-h-0');

                                                text.innerText = 'Expandir';
                                            }
                                        "
                                        class="rounded bg-gray-600 px-3 py-1 text-sm text-white hover:bg-gray-700"
                                    >
                                        <span id="toggle-text-{{ $contrato->id }}">
                                            Expandir
                                        </span>
                                    </button>
                                    @if ($contrato->status === 'ativo')
                                        <a
                                            href="{{ route('contratos.edit', $contrato->id) }}"
                                            class="rounded bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600"
                                        >
                                            Editar
                                        </a>
                                    @endif
                                    <form action="{{ route('contratos.destroy', $contrato->id) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr id="itens-{{ $contrato->id }}" class="bg-gray-50">
                            <td colspan="7" class="p-0 border-0">
                                <div
                                    id="content-{{ $contrato->id }}"
                                    class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out"
                                >
                                    <div class="px-6 py-4">
                                        <table class="min-w-full text-sm">
                                            <thead>
                                                <tr class="text-left text-gray-600">
                                                    <th class="pb-2">Serviço</th>
                                                    <th class="pb-2">Quantidade</th>
                                                    <th class="pb-2">Valor Unitário</th>
                                                    <th class="pb-2">Subtotal</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($contrato->itens as $item)
                                                    <tr class="border-t">
                                                        <td class="py-2">
                                                            {{ $item->servico->nome }}
                                                        </td>

                                                        <td class="py-2">
                                                            {{ $item->quantidade }}
                                                        </td>

                                                        <td class="py-2">
                                                            R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}
                                                        </td>

                                                        <td class="py-2">
                                                            R$ {{ number_format($item->quantidade * $item->valor_unitario, 2, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                Sem contratos cadastrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4">
                {{ $contratos->links() }}
            </div>
        </div>
    </div>
@endsection

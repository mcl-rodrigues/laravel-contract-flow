<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Servico;
use Illuminate\Http\Request;
use App\Services\ContratoService;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with(['cliente', 'itens.servico'])
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::where('status', 1)
            ->orderBy('nome')
            ->get();

        $servicos = Servico::orderBy('nome')->get();

        return view('contratos.create', compact(['clientes', 'servicos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ContratoService $contratoService)
    {
        $validated = $request->validate([
            'cliente' => ['required', 'exists:clientes,id'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:0,1'],
            'itens' => ['required', 'array', 'min:1'],
            'itens.*.servico_id' => [
                'required',
                'exists:servicos,id'
            ],
            'itens.*.quantidade' => [
                'required',
                'integer',
                'min:1'
            ],
            'itens.*.valor' => [
                'required',
                'numeric',
                'min:0'
            ],
        ], [
            // cliente
            'cliente.required' => 'O cliente é obrigatório.',
            'cliente.exists' => 'O cliente selecionado é inválido.',

            // data_inicio
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_inicio.date' => 'Informe uma data de início válida.',

            // data_fim
            'data_fim.date' => 'Informe uma data de fim válida.',
            'data_fim.after_or_equal' => 'A data de fim não pode ser menor que a data de início.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',

            // itens
            'itens.required' => 'Adicione pelo menos um serviço ao contrato.',
            'itens.array' => 'Os serviços enviados são inválidos.',
            'itens.min' => 'Adicione pelo menos um serviço ao contrato.',

            // itens.serviço
            'itens.*.servico_id.required' => 'Selecione um serviço.',
            'itens.*.servico_id.exists' => 'O serviço selecionado é inválido.',

            // itens.quantidade
            'itens.*.quantidade.required' => 'Informe a quantidade.',
            'itens.*.quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'itens.*.quantidade.min' => 'A quantidade deve ser no mínimo 1.',

            // itens.valor
            'itens.*.valor.required' => 'Informe o valor unitário.',
            'itens.*.valor.numeric' => 'O valor unitário deve ser numérico.',
            'itens.*.valor.min' => 'O valor unitário não pode ser negativo.',
        ]);

        $contratoService->create($validated);

        return redirect()
            ->route('contratos.index')
            ->with('success', 'Contrato cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        $contrato->load('itens');

        return view('contratos.edit', [
            'contrato' => $contrato,
            'clientes' => Cliente::all(),
            'servicos' => Servico::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato, ContratoService $contratoService)
    {
        if (!$contrato->status) {
            return response()->json([
                'message' => 'Contratos cancelados não podem ser editados.'
            ], 403);
        }

        $validated = $request->validate([
            'cliente' => ['required', 'exists:clientes,id'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:0,1'],
            'itens' => ['required', 'array', 'min:1'],
            'itens.*.servico_id' => [
                'required',
                'exists:servicos,id'
            ],
            'itens.*.quantidade' => [
                'required',
                'integer',
                'min:1'
            ],
            'itens.*.valor' => [
                'required',
                'numeric',
                'min:0'
            ],
        ], [
            // cliente
            'cliente.required' => 'O cliente é obrigatório.',
            'cliente.exists' => 'O cliente selecionado é inválido.',

            // data_inicio
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_inicio.date' => 'Informe uma data de início válida.',

            // data_fim
            'data_fim.date' => 'Informe uma data de fim válida.',
            'data_fim.after_or_equal' => 'A data de fim não pode ser menor que a data de início.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',

            // itens
            'itens.required' => 'Adicione pelo menos um serviço ao contrato.',
            'itens.array' => 'Os serviços enviados são inválidos.',
            'itens.min' => 'Adicione pelo menos um serviço ao contrato.',

            // itens.serviço
            'itens.*.servico_id.required' => 'Selecione um serviço.',
            'itens.*.servico_id.exists' => 'O serviço selecionado é inválido.',

            // itens.quantidade
            'itens.*.quantidade.required' => 'Informe a quantidade.',
            'itens.*.quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'itens.*.quantidade.min' => 'A quantidade deve ser no mínimo 1.',

            // itens.valor
            'itens.*.valor.required' => 'Informe o valor unitário.',
            'itens.*.valor.numeric' => 'O valor unitário deve ser numérico.',
            'itens.*.valor.min' => 'O valor unitário não pode ser negativo.',
        ]);

        $contratoService->update($contrato, $validated);

        return redirect()
            ->route('contratos.index')
            ->with('success', 'Contrato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);

        if (!$contrato) {
            return redirect()
                ->route('contratos.index')
                ->with('error', 'Contrato não encontrado.');
        }

        $contrato->delete();

        return redirect()
            ->route('contratos.index')
            ->with('success', 'Contrato excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = Contrato::with('cliente')->orderBy('id', 'asc')->paginate(10);

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

        return view('contratos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente' => ['required', 'exists:clientes,id'],
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:0,1'],
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
        ]);

        Contrato::create([
            'cliente_id' => $validated['cliente'],
            'data_inicio' => $validated['data_inicio'],
            'data_fim' => $validated['data_fim'],
            'status' => $validated['status'],
        ]);

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
        return view('contratos.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        $validated = $request->validate([
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['required', 'in:0,1'],
        ], [
            // data_inicio
            'data_inicio.required' => 'A data de início é obrigatória.',
            'data_inicio.date' => 'Informe uma data de início válida.',

            // data_fim
            'data_fim.date' => 'Informe uma data de fim válida.',
            'data_fim.after_or_equal' => 'A data de fim não pode ser menor que a data de início.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',
        ]);

        $contrato->update($validated);

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

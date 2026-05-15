<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Servico;
use App\Services\ContratoService;
use App\Http\Requests\Contrato\StoreContratoRequest;
use App\Http\Requests\Contrato\UpdateContratoRequest;

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
    public function store(StoreContratoRequest $request, ContratoService $contratoService)
    {
        $validated = $request->validated();

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
    public function update(UpdateContratoRequest $request, Contrato $contrato, ContratoService $contratoService)
    {
        if ($contrato->status === 'cancelado') {
            return response()->json([
                'message' => 'Contratos cancelados não podem ser editados.'
            ], 403);
        }

        $validated = $request->validated();

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

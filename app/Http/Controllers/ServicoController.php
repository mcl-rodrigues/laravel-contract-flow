<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Requests\Servico\StoreServicoRequest;
use App\Http\Requests\Servico\UpdateServicoRequest;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::orderBy('id', 'asc')->paginate(10);

        return view('servicos.index', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicoRequest $request)
    {
        $validated = $request->validated();

        Servico::create($validated);

        return redirect()
            ->route('servicos.index')
            ->with('success', 'Serviço cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servico $servico)
    {
        return view('servicos.edit', compact('servico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicoRequest $request, Servico $servico)
    {
        $validated = $request->validated();

        $servico->update($validated);

        return redirect()
            ->route('servicos.index')
            ->with('success', 'Serviço atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);

        if (!$servico) {
            return redirect()
                ->route('servicos.index')
                ->with('error', 'Serviço não encontrado.');
        }

        if ($servico->itensContrato()->exists()) {
            return redirect()
                ->route('servicos.index')
                ->with('error', 'Não é possível excluir este serviço pois ele está vinculado a contratos.');
        }

        $servico->delete();

        return redirect()
            ->route('servicos.index')
            ->with('success', 'Serviço excluído com sucesso!');
    }
}

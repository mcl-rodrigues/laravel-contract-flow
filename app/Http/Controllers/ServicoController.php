<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'min:3', 'max:50'],
            'valor_base' => 'required|numeric',
        ], [
            // nome
            'nome.required' => 'O nome do serviço é obrigatório.',
            'nome.string' => 'O nome do serviço deve ser um texto válido.',
            'nome.min' => 'O nome do serviço não pode ter menos de 3 caracteres.',
            'nome.max' => 'O nome do serviço não pode ter mais de 50 caracteres.',

            // valor base
            'valor_base.required' => 'O valor base é obrigatório.',
            'valor_base.numeric' => 'O valor base deve ser numérico.',
        ]);

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
    public function update(Request $request, Servico $servico)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'min:3', 'max:50'],
            'valor_base' => 'required|numeric',
        ], [
            // nome
            'nome.required' => 'O nome do serviço é obrigatório.',
            'nome.string' => 'O nome do serviço deve ser um texto válido.',
            'nome.min' => 'O nome do serviço não pode ter menos de 3 caracteres.',
            'nome.max' => 'O nome do serviço não pode ter mais de 50 caracteres.',

            // valor base
            'valor_base.required' => 'O valor base é obrigatório.',
            'valor_base.numeric' => 'O valor base deve ser numérico.',
        ]);

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

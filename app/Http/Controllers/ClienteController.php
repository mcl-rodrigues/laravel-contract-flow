<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'asc')->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $request)
    {
        $validated = $request->validated();

        Cliente::create($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $validated = $request->validated();

        $cliente->update($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return redirect()
                ->route('clientes.index')
                ->with('error', 'Cliente não encontrado.');
        }

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}

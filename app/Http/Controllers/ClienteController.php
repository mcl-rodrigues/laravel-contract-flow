<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'min:3', 'max:50'],
            'documento' => ['required', 'regex:/^(\d{11}|\d{14})$/', 'unique:clientes,documento'],
            'email' => ['required', 'email', 'max:50', 'unique:clientes,email'],
            'status' => ['required', 'in:0,1'],
        ], [
            // nome
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.max' => 'O nome não pode ter mais de 50 caracteres.',

            // documento
            'documento.required' => 'O documento é obrigatório.',
            'documento.regex' => 'O documento deve conter 11 dígitos (CPF) ou 14 dígitos (CNPJ).',
            'documento.unique' => 'Este documento já está cadastrado.',

            // email
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de 50 caracteres.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            // status
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'Status inválido. Escolha Ativo ou Inativo.',
        ]);

        Cliente::create($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
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

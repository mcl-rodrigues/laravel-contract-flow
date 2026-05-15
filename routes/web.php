<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ContratoController;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Contrato;

Route::get('/', function () {
    return view('dashboard', [
        'totalClientes' => Cliente::count(),
        'totalServicos' => Servico::count(),
        'totalContratos' => Contrato::count(),
    ]);
});

Route::resource('clientes', ClienteController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('contratos', ContratoController::class);

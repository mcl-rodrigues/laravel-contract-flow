<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\ContratoController;

Route::get('/', function () { return view('dashboard'); });

Route::resource('clientes', ClienteController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('contratos', ContratoController::class);

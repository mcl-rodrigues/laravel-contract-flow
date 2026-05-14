<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('dashboard'); });
Route::get('/contratos', function () { return view('contratos'); })->name('contratos');
Route::get('/servicos', function () { return view('servicos'); })->name('servicos');
Route::get('/clientes', function () { return view('clientes'); })->name('clientes');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::match(array('GET', 'POST'), '/', [ProdutoController::class, 'index'])->name('home');
Route::match(array('GET', 'POST'), '/categoria', [ProdutoController::class, 'categoria'])->name('categoria');
Route::match(array('GET', 'POST'), '/categoria/{idcategoria}', [ProdutoController::class, 'categoria'])->name('categoria_por_id');
Route::match(array('GET', 'POST'), '/exercicio1', [ProdutoController::class, 'categoria'])->name('exercicio1');
Route::match(array('GET', 'POST'), '/exercicio1/{idexercicio}', [ProdutoController::class, 'exercicio1_por_id'])->name('exercicio1_por_id');
Route::match(array('GET', 'POST'), '/produtos', [ClienteController::class, 'cadastrar'])->name('cadastrar');
Route::match(array('GET', 'POST'), '/contato', [ContatoController::class, 'contato'])->name('contato');
Route::match(array('GET', 'POST'), '/sobre', [SobreController::class, 'sobre'])->name('sobre');
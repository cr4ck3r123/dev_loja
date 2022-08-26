<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController; 
use App\Http\Controllers\UsuarioController; 

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
Route::match(array('GET', 'POST'), '/cadastrar', [ClienteController::class, 'cadastrar'])->name('cadastrar');
Route::match(array('GET', 'POST'), '/cliente/cadastrar', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar_cliente');
Route::match(array('GET', 'POST'), '/logar', [UsuarioController::class, 'logar'])->name('logar');
Route::match(array('GET', 'POST'), '/{idproduto}/carrinho/adicionar', [ProdutoController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
Route::match(array('GET', 'POST'), '/carrinho', [ProdutoController::class, 'verCarrinho'])->name('ver_carrinho');
Route::match(array('GET', 'POST'), '{indice}/excluircarrinho', [ProdutoController::class, 'excluirCarrinho'])->name('carrinho_excluir');
Route::match(array('GET', 'POST'), '/contato', [ContatoController::class, 'contato'])->name('contato');
Route::match(array('GET', 'POST'), '/sobre', [SobreController::class, 'sobre'])->name('sobre');
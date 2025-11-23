<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PromocaoController;
use App\Models\Promocao;
use App\Models\Produto;
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

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return redirect(route('dashboard'));
});

Route::get('/cardapio', function () {
    $promocoes = Promocao::all();
    $produtos = Produto::all();
    return view('dashboard', compact('promocoes', 'produtos'));
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para produtos
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos/criar', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/edit/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::patch('/produtos/editar/{id}', [ProdutoController::class, 'update'])->name('produtos.editar');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');


    // Rotas para promoções
    Route::get('/promocoes/view', [PromocaoController::class, 'index'])->name('promocoes.index');
    Route::get('/promocoes/create', [PromocaoController::class, 'create'])->name('promocoes.create');
    Route::post('/promocoes/criar', [PromocaoController::class, 'store'])->name('promocoes.store');
    Route::get('/promocoes/edit/{id}', [PromocaoController::class, 'edit'])->name('promocoes.edit');
    Route::patch('/promocoes/editar/{id}', [PromocaoController::class, 'update'])->name('promocoes.editar');
    Route::delete('/promocoes/{id}', [PromocaoController::class, 'destroy'])->name('promocoes.destroy');
});

Route::get('/lanches', [ProdutoController::class, 'lanches'])->name('produtos.lanches');
Route::get('/marmitas', [ProdutoController::class, 'marmitas'])->name('produtos.marmitas');
Route::get('/sobremesas', [ProdutoController::class, 'sobremesas'])->name('produtos.sobremesas');
Route::get('/bebidas', [ProdutoController::class, 'bebidas'])->name('produtos.bebidas');

require __DIR__ . '/auth.php';

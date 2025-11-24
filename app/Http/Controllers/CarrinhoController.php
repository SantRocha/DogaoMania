<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function add(Request $request)
    {
        $produto = Produto::findOrFail($request->id);

        $carrinho = session()->get('carrinho', []);

        if(isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]['quantidade'] += $request->quantidade;
        } else {
            $carrinho[$produto->id] = [
                'id' => $produto->id,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'imagem' => $produto->imagem,
                'quantidade' => $request->quantidade
            ];
        }

        session()->put('carrinho', $carrinho);

        $qtdTotal = collect($carrinho)->sum('quantidade');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'qtd' => $qtdTotal
            ]);
        }

        return back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function remove(Request $request)
    {
        $carrinho = session()->get('carrinho', []);

        if(isset($carrinho[$request->id])) {
            unset($carrinho[$request->id]);
        }

        session()->put('carrinho', $carrinho);

        return back()->with('success', 'Item removido!');
    }

    public function update(Request $request)
    {
        $carrinho = session()->get('carrinho', []);

        $id = $request->id;
        $action = $request->action;

        if(isset($carrinho[$id])) {

            if ($action === 'mais') {
                $carrinho[$id]['quantidade']++;
            }

            if ($action === 'menos') {
                $carrinho[$id]['quantidade']--;

                if ($carrinho[$id]['quantidade'] < 1) {
                    unset($carrinho[$id]);
                }
            }
        }

        session()->put('carrinho', $carrinho);

        return back();
    }
}

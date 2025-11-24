<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Promocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Lista todos os produtos
     */
    public function lanches()
    {
        $produtos = Produto::where('categoria', 'Lanches')->orderBy('nome', 'asc')->get();
        return view('dashboard', compact('produtos'));
    }

    public function marmitas()
    {
        $produtos = Produto::where('categoria', 'Marmitas')->orderBy('nome', 'asc')->get();
        return view('dashboard', compact('produtos'));
    }

    public function sobremesas()
    {
        $produtos = Produto::where('categoria', 'Sobremesas')->orderBy('nome', 'asc')->get();
        return view('dashboard', compact('produtos'));
    }

    public function bebidas()
    {
        $produtos = Produto::where('categoria', 'Bebidas')->orderBy('nome', 'asc')->get();
        return view('dashboard', compact('produtos'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Salva um produto no banco
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'        => 'required|string|max:255',
            'descricao'   => 'nullable|string',
            'ingredientes'=> 'nullable|string',
            'preco'       => 'required|numeric|min:0',
            'categoria'   => 'nullable|string|max:255',
            'imagem'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // move para public/produtos
            $file->move(public_path('produtos'), $filename);

            // salva caminho relativo para uso com asset()
            $data['imagem'] = 'produtos/' . $filename;
        }

        Produto::create($data);

        return redirect()->route('dashboard')->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Atualiza um produto
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'        => 'required|string|max:255',
            'descricao'   => 'nullable|string',
            'ingredientes'=> 'nullable|string',
            'preco'       => 'required|numeric|min:0',
            'categoria'   => 'nullable|string|max:255',
            'imagem'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $produto = Produto::findOrFail($id);

        $data = $request->all();

        // upload da imagem (e deletar a antiga)
        if ($request->hasFile('imagem')) {

            // Remove a imagem antiga
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }

            // Nova imagem
            $data['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($data);

        return redirect()->route('dashboard')->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Deletar um produto
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // deletar imagem se existir
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('dashboard')->with('success', 'Produto removido com sucesso.');
    }
}

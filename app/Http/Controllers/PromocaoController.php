<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromocaoController extends Controller
{
    /**
     * Lista todos os produtos
     */
    public function index()
    {
        $produtos = Promocao::all();
        return view('promocoes.index', compact('promocoes'));
    }

    /**
     * Mostra o formulário de criação
     */
    public function create()
    {
        return view('promocoes.create');
    }

    /**
     * Salva um produto no banco
     */
    public function store(Request $request)
    {
        $request->validate([
            'promocao'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        // Upload da imagem
        if ($request->hasFile('promocao')) {
            $data['promocao'] = $request->file('promocao')->store('promocoes', 'public');
        }

        Promocao::create($data);

        return redirect()->route('promocoes.index')->with('success', 'Promoçao criada com sucesso.');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $produto = Promocao::findOrFail($id);
        return view('promocoes.edit', compact('promocao'));
    }

    /**
     * Atualiza um produto
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'promocao'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $produto = Promocao::findOrFail($id);

        $data = $request->all();

        // upload da imagem (e deletar a antiga)
        if ($request->hasFile('promocao')) {

            // Remove a imagem antiga
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }

            // Nova imagem
            $data['promocao'] = $request->file('promocao')->store('promocoes', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Promoçao atualizada com sucesso.');
    }

    /**
     * Deletar um produto
     */
    public function destroy($id)
    {
        $promocao = Promocao::findOrFail($id);

        // deletar imagem
        if ($promocao->promocao && Storage::disk('public')->exists($promocao->promocao)) {
            Storage::disk('public')->delete($promocao->promocao);
        }

        $promocao->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso.');
    }
}

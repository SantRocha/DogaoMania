<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromocaoController extends Controller
{
    /**
     * Lista todos os promoçoes
     */
    public function index()
    {
        $promocoes = Promocao::all();
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
     * Salva uma promoção no banco
     */
    public function store(Request $request)
    {
        $request->validate([
            'imagem'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // move para public/promocoes
            $file->move(public_path('promocoes'), $filename);

            // salva caminho relativo para uso com asset()
            $data['imagem'] = 'promocoes/' . $filename;
        }

        Promocao::create($data);

        return redirect()->route('dashboard')->with('success', 'Promoção criada com sucesso.');
    }

    /**
     * Formulário de edição
     */
    public function edit($id)
    {
        $promocao = Promocao::findOrFail($id);
        return view('promocoes.edit', compact('promocao'));
    }

    /**
     * Atualiza uma promoção
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $promocao = Promocao::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('imagem')) {

            // Remove a imagem antiga
            if ($promocao->imagem && file_exists(public_path($promocao->imagem))) {
                @unlink(public_path($promocao->imagem));
            }

            // Nova imagem
            $file = $request->file('imagem'); // ✔ CORRETO AGORA
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('promocoes'), $filename);

            $data['imagem'] = 'promocoes/' . $filename;
        }

        $promocao->update($data);

        return redirect()->route('dashboard')->with('success', 'Promoção atualizada com sucesso.');
    }


    /**
     * Deletar uma promoção
     */
    public function destroy($id)
    {
        $promocao = Promocao::findOrFail($id);

        // deletar imagem (verifica public primeiro, depois storage como fallback)
        if ($promocao->imagem && file_exists(public_path($promocao->imagem))) {
            @unlink(public_path($promocao->imagem));
        } elseif ($promocao->imagem && Storage::disk('public')->exists($promocao->imagem)) {
            Storage::disk('public')->delete($promocao->imagem);
        }

        $promocao->delete();

        return redirect()->route('dashboard')->with('success', 'Promoção removida com sucesso.');
    }
}

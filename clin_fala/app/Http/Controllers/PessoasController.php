<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoasFormRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function create()
    {
        return view('pessoas.create');
    }

    public function store(PessoasFormRequest $request)
    {
        // Validação e criação da pessoa
        $pessoa = Pessoa::create($request->validated());

        return to_route('ramais.create', ['pessoa_id' => $pessoa->id])
            ->with('mensagem.sucesso', 'Pessoa criada com sucesso! Agora, adicione um ramal.');
    }

    public function index(Request $request)
    {
        $pessoas = Pessoa::with('ramal')->get(); // Carregar o ramal associado

        $query = Pessoa::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }
    
        if ($request->filled('setor')) {
            $query->where('setor', 'like', '%' . $request->setor . '%');
        }
    
        if ($request->filled('local')) {
            $query->where('local', 'like', '%' . $request->local . '%');
        }
    
        if ($request->filled('ramal')) {
            $query->whereHas('ramal', function($q) use ($request) {
                $q->where('ramal', 'like', '%' . $request->ramal . '%');
            });
        }
    
        $pessoas = $query->get();
    
        return view('pessoas.index', compact('pessoas'));
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    public function update(PessoasFormRequest $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->update($request->validated());
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy($id)
{
    $pessoa = Pessoa::findOrFail($id);

    $pessoa->delete();
    $pessoa->ramal->delete();

    return redirect()->route('pessoas.index')->with('success', 'Pessoa e ramal deletados com sucesso!');
}
public function testRelationship($id)
{
    $pessoa = Pessoa::findOrFail($id);
    if ($pessoa->ramal) {
        return "A pessoa com o nome {$pessoa->nome} está associada ao ramal {$pessoa->ramal->ramal}.";
    } else {
        return "A pessoa com o nome {$pessoa->nome} não possui ramal associado.";
    }
}
}

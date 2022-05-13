<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();

        return view('setor.index', ['setores' => $setores]);
    }

    public function criar()
    {
        return view('setor.criar');
    }

    public function registrar(Request $request)
    {
        $setor = new Setor();

        $setor->sigla = $request->sigla;
        $setor->descricao = $request->descricao;
        $setor->save();

        return redirect('/setor')->with('msg', 'Setor cadastrado com sucesso!');
    }

    public function visualizar($id)
    {
        $setor = Setor::findOrFail($id);

        return view('setor.visualizar', ['setor' => $setor]);
    }

    public function editar($id)
    {
        $setor = Setor::findOrFail($id);

        return view('setor.editar', ['setor' => $setor]);
    }

    public function atualizar(Request $request)
    {
        Setor::findOrFail($request->id)->update($request->all());

        return redirect("/setor/visualizar/{$request->id}")->with('msg', 'Setor atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $setor = Setor::findOrFail($id)->delete();

        return redirect('/setor')->with('msg', 'Setor deletado com sucesso!');
    }
}

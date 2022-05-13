<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    public function index()
    {
        $tipos_documento = TipoDocumento::all();

        return view('tipo_documento.index', ['tipos_documento' => $tipos_documento]);
    }

    public function criar()
    {
        return view('tipo_documento.criar');
    }

    public function registrar(Request $request)
    {
        $tipo_documento = new TipoDocumento();

        $tipo_documento->descricao = $request->descricao;
        $tipo_documento->save();

        return redirect('/tipo_documento')->with('msg', 'Tipo de documento cadastrado com sucesso!');
    }

    public function visualizar($id)
    {
        $tipo_documento = TipoDocumento::findOrFail($id);

        return view('tipo_documento.visualizar', ['tipo_documento' => $tipo_documento]);
    }

    public function editar($id)
    {
        $tipo_documento = TipoDocumento::findOrFail($id);

        return view('tipo_documento.editar', ['tipo_documento' => $tipo_documento]);
    }

    public function atualizar(Request $request)
    {
        TipoDocumento::findOrFail($request->id)->update($request->all());

        return redirect("/tipo_documento/visualizar/{$request->id}")
            ->with('msg', 'Tipo de documento atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $tipo_documento = TipoDocumento::findOrFail($id)->delete();

        return redirect('/tipo_documento')->with('msg', 'Tipo de documento deletado com sucesso!');
    }
}

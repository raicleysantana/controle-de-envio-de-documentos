<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();

        return view('documento.index', ['documentos' => $documentos]);
    }

    public function criar()
    {
        $list_tipo_documento = TipoDocumento::all(['id', 'descricao']);

        return view('documento.criar', ['list_tipo_documento' => $list_tipo_documento]);
    }

    public function registrar(Request $request)
    {
        $documento = new Documento();

        #@formatter:off
        $documento->numero_documento  = $request->numero_documento;
        $documento->titulo            = $request->titulo;
        $documento->tipo_documento_id = $request->tipo_documento_id;
        $documento->descricao         = $request->descricao;
        $documento->descricao         = $request->descricao;
        $documento->data_criacao      = date('Y-m-d H:i:s');
        #arquivo upload
        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
            $requestFile  = $request->arquivo;
            $extension    = $requestFile->extension();
            $aquivoName    = md5($requestFile->getClientOriginalName().strtotime('now')) .".{$extension}";

            $requestFile->move(storage_path('app/public/documentos'),$aquivoName);
            $documento->arquivo = $aquivoName;
        }
        #@formatter:on
        $documento->save();

        return redirect('/documento')->with('msg', 'Documento cadastrado com sucesso!');
    }

    public function visualizar($id)
    {
        $documento = Documento::findOrFail($id);

        return view('documento.visualizar', ['documento' => $documento]);
    }

    public function editar($id)
    {
        $documento = Documento::findOrFail($id);

        $list_tipo_documento = TipoDocumento::all(['id', 'descricao']);

        return view('documento.editar', [
            'documento' => $documento,
            'list_tipo_documento' => $list_tipo_documento
        ]);
    }

    public function atualizar(Request $request)
    {
        $data = $request->all();

        $documento = Documento::findOrFail($request->id);

        if ($documento->arquivo) {
            unset($data['arquivo']);
        }

        $documento->update($data);

        return redirect("/documento/visualizar/{$request->id}")
            ->with('msg', 'Documento atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $documento = Documento::findOrFail($id)->delete();

        return redirect('/documento')->with('msg', 'Documento deletado com sucesso!');
    }

    public function download($arquivo)
    {
        $destino = storage_path('app/public/documentos/' . $arquivo);

        return response()->download($destino, $arquivo);
    }
}

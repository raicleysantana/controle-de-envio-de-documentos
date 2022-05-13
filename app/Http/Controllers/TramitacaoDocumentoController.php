<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Setor;
use App\Models\TipoDocumento;
use App\Models\TramitacaoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramitacaoDocumentoController extends Controller
{
    public function index()
    {
        $tramitacao_documento = TramitacaoDocumento::all();

        return view('tramitacao.index', ['tramitacao_documento' => $tramitacao_documento]);
    }

    public function tramitar()
    {
        $documentos = DB::table('tramitacao_documento', 'td')
            ->join('documento', 'td.documento_id', '!=', 'documento.id')
            ->select('documento.*')
            ->get();

        $setores = Setor::all(['id', 'descricao']);

        return view('tramitacao.tramitar', [
            'documentos' => $documentos,
            'setores' => $setores
        ]);
    }

    public function cadastrar(Request $request)
    {
        $tramitacaoDocumento = new TramitacaoDocumento();

        #@formatter:off
        $tramitacaoDocumento->documento_id    = $request->documento_id;
        $tramitacaoDocumento->setor_envio_id  = $request->setor_envio_id;
        $tramitacaoDocumento->setor_recebe_id = $request->setor_recebe_id;
        $tramitacaoDocumento->data_hora_envio = date('Y-m-d H:i:s');
        $tramitacaoDocumento->documento_id    = $request->documento_id;
        #@formatter:off

        $tramitacaoDocumento->save();

        return redirect('/tramitacao')->with('msg', 'Documento tramitado com sucesso!');

    }

    public function setorJson()
    {
        $selecionado = \request('selecionado');

        $setores = Setor::all()->where('id', '!=', $selecionado);

        $data = [];

        foreach ($setores as $setor) {
            $data[] = [
                'id' => $setor['id'],
                'descricao' => $setor['descricao']
            ];
        }

        return json_encode($data);
    }

    public function receber($id){
        $tramitacaoDocumento = TramitacaoDocumento::findOrFail($id);

        return view('tramitacao.receber',['tramitacaoDocumento'=>$tramitacaoDocumento]);
    }

}

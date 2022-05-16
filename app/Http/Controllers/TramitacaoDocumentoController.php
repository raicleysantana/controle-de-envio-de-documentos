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
        $documentos = Documento::leftJoin('tramitacao_documento', function ($join) {
            $join->on('documentos.id', '=', 'tramitacao_documento.documento_id');
        })
            ->whereNull('tramitacao_documento.documento_id')
            ->get([
                'documentos.id',
                'documentos.titulo',
                'documentos.numero_documento'
            ]);

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
        $tramitacaoDocumento->situacao        = TramitacaoDocumento::PENDENTE;
        #@formatter:on

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

    public function receber($id)
    {
        $tramitacaoDocumento = TramitacaoDocumento::findOrFail($id);

        return view('tramitacao.receber', ['tramitacaoDocumento' => $tramitacaoDocumento]);
    }

    public function confirmar(Request $request)
    {
        $tramitacaoDocumento = TramitacaoDocumento::findOrFail($request->id);

        $tramitacaoDocumento->data_hora_recebe = date('Y-m-d H:i:s');
        $tramitacaoDocumento->situacao = '';
        $tramitacaoDocumento->save();

        $setorRecebeu = $tramitacaoDocumento->setorRecebe->descricao;

        return redirect('/tramitacao')
            ->with('msg', "Documento recebido com sucesso pelo setor {$setorRecebeu}");
    }

    public function enviar($id)
    {
        $tramitacaoDocumento = TramitacaoDocumento::findOrFail($id);

        $setores = Setor::all(['id', 'descricao'])->where('id', '!=', $tramitacaoDocumento->setor_recebe_id);

        return view('tramitacao.enviar', [
            'tramitacaoDocumento' => $tramitacaoDocumento,
            'setores' => $setores
        ]);
    }

    public function enviar_tramitacao(Request $request)
    {
        #@formatter:off
        $tramitacaoDocumento = TramitacaoDocumento::findOrFail($request->id);
        $novaTramitacao = new TramitacaoDocumento();

        TramitacaoDocumento::where('documento_id', $tramitacaoDocumento->documento_id)
            ->update(['situacao' => 'recebido']);

        $novaTramitacao->setor_envio_id  = $tramitacaoDocumento->setor_recebe_id;
        $novaTramitacao->setor_recebe_id = $request->setor_recebe_id;
        $novaTramitacao->data_hora_envio = date('Y-m-d H:i:s');
        $novaTramitacao->documento_id    = $tramitacaoDocumento->documento_id;
        $novaTramitacao->situacao        = 'pendente';
        $novaTramitacao->save();
        #@formatter:on

        return redirect('/tramitacao')->with('msg', 'Nova tramitação realizada com sucesso!');
    }

    public function tramitacoes($id)
    {
        $documento = Documento::findOrFail($id);

        return view('tramitacao.tramitacoes', ['documento' => $documento]);
    }

}

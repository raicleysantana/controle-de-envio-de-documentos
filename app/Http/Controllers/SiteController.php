<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Setor;
use App\Models\TipoDocumento;
use App\Models\TramitacaoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class SiteController extends Controller
{
    public function index()
    {
        $search = \request('search');

        $dados = [];

        if ($search) {
            /*$dados = DB::table('tramitacao_documento', 'td')
                ->join('documentos', 'td.documento_id', '=', 'documentos.id')
                ->where([['documentos.numero_documento', 'like', "'%{$search}%'"]])
                ->select('documentos.*')
                ->get();*/


            $dados = DB::table('tramitacao_documento', 'td')
                ->select('documentos.*')
                ->leftJoin('documentos', 'td.documento_id', '=', 'documentos.id')
                ->where('documentos.numero_documento', 'like', '%' . $search . '%')
                ->groupBy('td.documento_id')
                ->get();
        }

        return view('welcome', [
            'dados' => $dados,
            'search' => $search
        ]);
    }


}

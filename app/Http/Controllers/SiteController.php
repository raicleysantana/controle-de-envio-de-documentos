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
            $dados = DB::table('tramitacao_documento', 'td')
                ->join('documento', 'td.documento_id', '=', 'documento.id')
                ->where([['documento.numero_documento', 'like', "%{$search}%"]])
                ->select('documento.*')
                ->get();
        }

        return view('welcome', [
            'dados' => $dados,
            'search' => $search
        ]);
    }


}

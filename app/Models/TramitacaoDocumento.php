<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramitacaoDocumento extends Model
{
    use HasFactory;

    const RECEBIDO = 'recebido';
    const PENDENTE = 'pendente';

    protected $table = "tramitacao_documento";

    public function setorRecebe()
    {
        return $this->belongsTo('App\Models\Setor', 'setor_recebe_id');
    }

    public function setorEnvio()
    {
        return $this->belongsTo('App\Models\Setor', 'setor_envio_id');
    }

    public function documento()
    {
        return $this->belongsTo('App\Models\documento', 'documento_id', 'id');
    }

}

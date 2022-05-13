<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = "documento";

    protected $guarded = [];

    public function tipoDocumento()
    {
        return $this->belongsTo('App\Models\TipoDocumento');
    }

    public function tramitacaoDocumento()
    {
        return $this->belongsTo('App\Models\TramitacaoDocumento', 'id', 'documento_id');
    }

    public function getDataCriacao()
    {
        return date('d/m/Y', strtotime($this->data_criacao));
    }

    public function getArquivo()
    {
        return storage_path("app/public/documentos/{$this->arquivo}");
    }


}

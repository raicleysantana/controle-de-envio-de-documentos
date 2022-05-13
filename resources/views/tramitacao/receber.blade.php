@extends('layouts.main')
@section('title','Tramitar documento')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-3">Recebimento de tramitação</h2>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width: 20%">Setor Remetente</td>
                <td>{{ $tramitacaoDocumento->setorEnvio->descricao }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Data envio</td>
                <td>{{ date('d/m/Y',strtotime($tramitacaoDocumento->data_hora_envio)) }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Setor destinatário</td>
                <td>{{ $tramitacaoDocumento->setorRecebe->descricao }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Documento</td>
                <td>
                    {{ $tramitacaoDocumento->documento->numero_documento.' - '.$tramitacaoDocumento->documento->titulo }}
                </td>
            </tr>
        </table>

        <form action="/tramitacao/confirmar">
            @csrf
            <button class="btn btn-outline-success" type="submit">Confirmar recebimento</button>
        </form>
    </div>
@endsection

@extends('layouts.main')

@section('title','Início')

@section('content')
    <div class="container-fluid mt-5">
        <h2>Tramitações do documento <b>{{ $documento->numero_documento }}</b></h2>


        <h4 class="my-4">Documento</h4>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width: 20%">Número do documento</td>
                <td>
                    <a href="/documento/visualizar/{{ $documento->id }}">{{ $documento->numero_documento }}</a>
                </td>
            </tr>
            <tr>
                <td style="width: 20%">Título</td>
                <td>{{ $documento->titulo }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Tipo de documento</td>
                <td>{{ $documento->tipoDocumento->descricao }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Arquivo</td>
                <td>
                    <a
                        target="_blank"
                        href="/documento/download/{{ $documento->arquivo }}">
                        {{ $documento->arquivo }}
                    </a>
                </td>
            </tr>
        </table>

        <h4 class="my-4">Movimentações</h4>

        <table class="table">
            <thead>
            <tr>
                <th>De</th>
                <th>Data e hora de Envio</th>
                <th>Para</th>
                <th>Data e hora de recebimento</th>
            </tr>
            </thead>
            <tbody>
            @foreach($documento->tramitacaoDocumento as $tradoc)
                <tr>
                    <td>{{ $tradoc->setorEnvio->descricao }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($tradoc->data_hora_envio)) }}</td>
                    <td>{{ $tradoc->setorRecebe ? $tradoc->setorRecebe->descricao : '' }}</td>
                    <td>
                        @if(!$tradoc->data_hora_recebe)
                            <a
                                href="/tramitacao/receber/{{$tradoc->id}}"
                                class="btn btn-outline-success btn-sm me-1 d-inline">
                                Receber
                            </a>
                        @else
                            {{ $tradoc->data_hora_recebe ?  date('d/m/Y H:i', strtotime($tradoc->data_hora_recebe)): '' }}
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

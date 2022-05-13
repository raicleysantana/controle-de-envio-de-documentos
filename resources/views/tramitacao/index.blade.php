@extends('layouts.main')

@section('title','Tramitação de documentos')

@section('content')
    <div class="container-fluid mt-5">
        <h2>Tramitação de documentos</h2>

        <div class="card mt-4">
            <div class="card-body">
                <div class="float-end">
                    <a href="/tramitacao/tramitar" class="btn btn-outline-success">Tramitar documento</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Número documento</th>
                        <th>Título</th>
                        <th>Setor Envio</th>
                        <th>Data Hora envio</th>
                        <th>Setor recebeu</th>
                        <th>Data Hora recebeu</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tramitacao_documento as $tramitacao)
                        <tr>
                            <td class="fw-bold">{{ $tramitacao->documento->numero_documento }}</td>
                            <td>{{ $tramitacao->documento->titulo }}</td>
                            <td>{{ $tramitacao->setorEnvio->descricao }}</td>
                            <td>{{ date('d/m/Y H:m', strtotime($tramitacao->data_hora_envio)) }}</td>
                            <td>{{ $tramitacao->setorRecebe ? $tramitacao->setorRecebe->descricao : '' }}</td>
                            <td>{{ $tramitacao->data_hora_recebe }}</td>
                            <td>
                                <a
                                    href="/tramitacao/receber/{{$tramitacao->id}}"
                                    class="btn btn-outline-primary btn-sm me-1 d-inline">
                                    Receber
                                </a>
                                <a
                                    href="/documento/editar/{{$tramitacao->id}}"
                                    class="btn btn-outline-warning btn-sm me-1 d-inline">
                                    Enviar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('.btn-deletar').click(function (e) {
                e.preventDefault();

                let obj = $(this);
                let id = obj.data('id');

                $.alert({
                    title: false,
                    content: 'Tem certeza que deseja excluir?',
                    buttons: {
                        sim: {
                            text: 'sim',
                            action: function () {
                                $(`.form-deletar-documento-${id}`).submit();
                            },
                        },
                        nao: {
                            text: 'Não',
                            action: function () {
                            }
                        }
                    }
                })
            });
        })
    </script>
@endsection

@extends('layouts.main')
@section('title','Visualizar #'.$documento->id)

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="d-flex flex-row justify-content-between mb-3">
                <h2>Visualizar</h2>

                <div class="d-flex flex-row align-items-center">
                    <a
                        href="/documento"
                        class="btn btn-outline-success d-inline me-1">
                        Listagem
                    </a>
                    <a
                        href="/documento/editar/{{$documento->id}}"
                        class="btn btn-outline-warning d-inline me-1">
                        Editar
                    </a>
                    <form
                        class="form-deletar-documento-{{$documento->id}} d-inline"
                        action="/documento/{{$documento->id}}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="type"
                            data-id="{{$documento->id}}"
                            class="btn btn-outline-danger btn-deletar">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>


            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td style="width: 20%">Codigo</td>
                    <td>{{ $documento->id }}</td>
                </tr>
                <tr>
                    <td style="width: 20%">Número do documento</td>
                    <td>{{ $documento->numero_documento }}</td>
                </tr>
                <tr>
                    <td style="width: 20%">Título</td>
                    <td>{{ $documento->titulo }}</td>
                </tr>
                <tr>
                    <td style="width: 20%">Descrição</td>
                    <td>{{ $documento->descricao }}</td>
                </tr>
                <tr>
                    <td style="width: 20%">Data de criação</td>
                    <td>{{ $documento->getDataCriacao() }}</td>
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

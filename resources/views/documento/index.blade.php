@extends('layouts.main')

@section('title','Documentos')

@section('content')
    <div class="container mt-5">
        <h2>Documentos</h2>

        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <a href="/documento/criar" class="btn btn-outline-success">Novo documento</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Número documento</th>
                        <th>Título</th>
                        <th>Tipo de documento</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documentos as $documento)
                        <tr>
                            <td>{{ $documento->id }}</td>
                            <td class="fw-bold">{{ $documento->numero_documento }}</td>
                            <td>{{ $documento->titulo }}</td>
                            <td>{{ $documento->tipoDocumento->descricao }}</td>
                            <td>{{ $documento->getDataCriacao() }}</td>
                            <td>
                                <a
                                    href="/documento/visualizar/{{$documento->id}}"
                                    class="btn btn-outline-primary btn-sm me-1 d-inline">
                                    Visualizar
                                </a>
                                <a
                                    href="/documento/editar/{{$documento->id}}"
                                    class="btn btn-outline-warning btn-sm me-1 d-inline">
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
                                        class="btn btn-outline-danger btn-sm btn-deletar">
                                        Excluir
                                    </button>
                                </form>
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

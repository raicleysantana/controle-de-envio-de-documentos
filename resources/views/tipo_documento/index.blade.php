@extends('layouts.main')

@section('title','Tipo de Documento')

@section('content')
    <div class="container mt-5">
        <h2>Tipo de documento</h2>

        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <a href="/tipo_documento/criar" class="btn btn-outline-success">Novo</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tipos_documento as $tipo_documento)
                        <tr>
                            <td>{{ $tipo_documento->id }}</td>
                            <td>{{ $tipo_documento->descricao }}</td>
                            <td style="width: 40%">
                                <a
                                    href="/tipo_documento/visualizar/{{$tipo_documento->id}}"
                                    class="btn btn-outline-primary btn-sm me-1 d-inline">
                                    Visualizar
                                </a>
                                <a
                                    href="/tipo_documento/editar/{{$tipo_documento->id}}"
                                    class="btn btn-outline-warning btn-sm me-1 d-inline">
                                    Editar
                                </a>
                                <form
                                    class="form-deletar-tipo-documento-{{$tipo_documento->id}} d-inline"
                                    action="/tipo_documento/{{$tipo_documento->id}}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="type"
                                        data-id="{{$tipo_documento->id}}"
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
                                $(`.form-deletar-tipo-documento-${id}`).submit();
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

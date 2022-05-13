@extends('layouts.main')
@section('title','Visualizar #'.$tipo_documento->id)

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="d-flex flex-row justify-content-between mb-3">
                <h2>Visualizar</h2>

                <div class="d-flex flex-row align-items-center">
                    <a
                        href="/tipo_documento"
                        class="btn btn-outline-success d-inline me-2">
                        Listagem
                    </a>
                    <a
                        href="/tipo_documento/editar/{{$tipo_documento->id}}"
                        class="btn btn-outline-warning d-inline me-2">
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
                    <td>{{ $tipo_documento->id }}</td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td>{{ $tipo_documento->descricao }}</td>
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

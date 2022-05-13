@extends('layouts.main')
@section('title',$setor->sigla)

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="d-flex flex-row justify-content-between mb-3">
                <h2>Visualizar</h2>

                <div class="d-flex flex-row align-items-center">
                    <a
                        href="/setor"
                        class="btn btn-outline-success d-inline me-2">
                        Listagem
                    </a>
                    <a
                        href="/setor/editar/{{$setor->id}}"
                        class="btn btn-outline-warning d-inline me-2">
                        Editar
                    </a>
                    <form
                        class="form-deletar-setor-{{$setor->id}} d-inline"
                        action="/setor/{{$setor->id}}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="type"
                            data-id="{{$setor->id}}"
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
                    <td>{{ $setor->id }}</td>
                </tr>
                <tr>
                    <td>Sigla</td>
                    <td>{{ $setor->sigla }}</td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td>{{ $setor->descricao }}</td>
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
                                $(`.form-deletar-setor-${id}`).submit();
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

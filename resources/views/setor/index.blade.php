@extends('layouts.main')

@section('title','Setores')

@section('content')
    <div class="container mt-5">
        <h2>Setores</h2>

        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <a href="/setor/criar" class="btn btn-outline-success">Novo</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Sigla</th>
                        <th>Descrição</th>
                        <th style="width: 30%">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($setores as $setor)
                        <tr>
                            <td>{{ $setor->id }}</td>
                            <td>{{ $setor->sigla }}</td>
                            <td>{{ $setor->descricao }}</td>
                            <td>
                                <a
                                    href="/setor/visualizar/{{$setor->id}}"
                                    class="btn btn-outline-primary btn-sm me-1 d-inline">
                                    Visualizar
                                </a>
                                <a
                                    href="/setor/editar/{{$setor->id}}"
                                    class="btn btn-outline-warning btn-sm me-1 d-inline">
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
                                        type="button"
                                        data-id="{{$setor->id}}"
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

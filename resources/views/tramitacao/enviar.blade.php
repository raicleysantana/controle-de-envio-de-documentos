@extends('layouts.main')
@section('title','Tramitar documento')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-3">Enviar documento</h2>

        <table class="table table-bordered">
            <tbody>
            <tr>
                <td style="width: 20%">Número do documento</td>
                <td>{{ $tramitacaoDocumento->documento->numero_documento }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Título</td>
                <td>{{ $tramitacaoDocumento->documento->titulo }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Setor remetente</td>
                <td>{{ $tramitacaoDocumento->setorRecebe->descricao}}</td>
            </tr>
        </table>

        <h2 class="mt-5">Setor destinatário</h2>

        <form action="/tramitacao/enviar_tramitacao/{{ $tramitacaoDocumento->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="setor_recebe_id">Setor</label>

                <select
                    class="form-control"
                    id="setor_recebe_id"
                    name="setor_recebe_id"
                    required
                >
                    <option value=""></option>
                    @foreach($setores as $setor)
                        <option value="{{ $setor->id }}">{{ $setor->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button class="btn btn-success">Tramitar</button>
            </div>
        </form>
    </div>
@endsection

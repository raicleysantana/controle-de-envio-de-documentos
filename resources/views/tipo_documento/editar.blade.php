@extends('layouts.main')
@section('title','Editar tipo documento #'.$tipo_documento->id)

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Editar setor</h2>

            <form action="/tipo_documento/atualizar/{{ $tipo_documento->id }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="descricao">Descricao</label>

                    <input
                        type="text"
                        class="form-control"
                        id="descricao"
                        name="descricao"
                        placeholder="Descrição"
                        value="{{ $tipo_documento->descricao }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

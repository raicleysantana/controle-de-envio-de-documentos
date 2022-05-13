@extends('layouts.main')
@section('title','Criar setor')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Criar setor</h2>

            <form action="/setor/atualizar/{{ $setor->id }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="sigla">Sigla</label>

                    <input
                        type="text"
                        class="form-control"
                        id="sigla"
                        name="sigla"
                        placeholder="Sigla"
                        value="{{ $setor->sigla }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="descricao">Descricao</label>

                    <input
                        type="text"
                        class="form-control"
                        id="descricao"
                        name="descricao"
                        placeholder="Descrição"
                        value="{{ $setor->descricao }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')
@section('title','Editar documento #'.$documento->id)

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Editar documento</h2>

            <form action="/documento/atualizar/{{ $documento->id }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="numero_documento">Número do documento</label>

                    <input
                        type="text"
                        class="form-control"
                        id="numero_documento"
                        name="numero_documento"
                        placeholder="Número do documento"
                        value="{{ $documento->numero_documento }}"
                        disabled
                    >
                </div>

                <div class="mb-3">
                    <label for="titulo">Título</label>

                    <input
                        type="text"
                        class="form-control"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo"
                        value="{{ $documento->titulo }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="descricao">Descrição</label>

                    <input
                        type="text"
                        class="form-control"
                        id="descricao"
                        name="descricao"
                        placeholder="Descrição"
                        value="{{ $documento->descricao }}"
                        required
                    >
                </div>


                <div class="mb-3">
                    <label for="tipo_documento_id">Tipo de documento</label>
                    <select
                        class="form-control"
                        name="tipo_documento_id"
                        id="tipo_documento_id"
                        required
                    >
                        <option value=""></option>

                        @foreach($list_tipo_documento as $tipo)

                            <option
                                value="{{$tipo->id}}"
                                {{ $documento->tipo_documento_id == $tipo->id ? 'selected' : ''}}
                            >
                                {{$tipo->descricao}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="arquivo">Arquivo</label>

                    <div class="row">
                        <div class="col">
                            <input
                                type="file"
                                class="form-control"
                                id="arquivo"
                                name="arquivo"
                                placeholder="Arquivo"
                            >
                        </div>

                        <div class="col-auto">
                            <a href="/documento/download/{{ $documento->arquivo }}">
                                {{ $documento->arquivo }}
                            </a>
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')
@section('title','Criar documento')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Criar documento</h2>

            <form action="/documento" method="POST" class="mt-4" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="numero_documento">Número do documento</label>

                    <input
                        type="text"
                        class="form-control"
                        id="numero_documento"
                        name="numero_documento"
                        placeholder="Número do documento"
                        required
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
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="tipo_documento_id">Tipo de documento</label>

                    <select class="form-control" name="tipo_documento_id" id="tipo_documento_id">
                        <option value=""></option>
                        @foreach($list_tipo_documento as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="arquivo">Arquivo</label>

                    <input
                        type="file"
                        class="form-control"
                        id="arquivo"
                        name="arquivo"
                        placeholder="Arquivo"
                    >
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.main')
@section('title','Criar tipo de documento')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Criar Tipo de documento</h2>

            <form action="/tipo_documento" method="POST" class="mt-4">
                @csrf

                <div class="mb-3">
                    <label for="descricao">Descricao</label>

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
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

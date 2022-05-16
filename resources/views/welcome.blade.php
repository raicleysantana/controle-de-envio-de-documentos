@extends('layouts.main')

@section('title','Início')

@section('content')

    <div class="container mt-5">
        <h2>Consultar documento</h2>

        <form action="/">
            <div class="input-group mt-4 mb-3">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Digite um numero de documento"
                    aria-label="Recipient's username"
                    name="search"
                    value="{{ $search }}"
                >
                <button type="submit" class="input-group-text btn btn-success">Pesquisar</button>
            </div>
        </form>

        @if(count($dados) > 0 and $search)

            <p>{{ count($dados) }} Resultados retornado</p>

            <table class="table">
                <thead>
                <th>Número documento</th>
                <th>Titulo</th>
                <th>Ações</th>
                </thead>
                <tbody>
                @foreach($dados as $dado)
                    <tr>
                        <td>
                            <a href="/documento/visualizar/{{ $dado->id }}">{{ $dado->numero_documento }}</a>
                        </td>
                        <td>{{ $dado->titulo }}</td>
                        <td>
                            <a
                                href="/tramitacao/tramitacoes/{{ $dado->id }}"
                                class="btn btn-outline-success btn-sm">
                                Tramitações
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum resultado encontrado</p>
        @endif
    </div>
@endsection

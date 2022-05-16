@extends('layouts.main')
@section('title','Tramitar documento')

@section('content')
    <div class="container">
        <div class="col-md-12 mt-5">

            <h2>Tramitar documento</h2>

            <form action="/tramitacao" method="POST" class="mt-5">
                @csrf

                <div class="mb-3">
                    <label for="documento_id">Documento</label>

                    <select class="form-control" id="documento_id" name="documento_id">
                        <option value=""></option>
                        @foreach($documentos as $documento)
                            <option value="{{ $documento->id }}">
                                {{ $documento->numero_documento .' - '.$documento->titulo }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="setor_envio_id">Setor remetente</label>

                    <select
                        class="form-control"
                        id="setor_envio_id"
                        name="setor_envio_id"
                        required
                    >
                        <option value=""></option>
                        @foreach($setores as $setor)
                            <option value="{{ $setor->id }}">{{ $setor->descricao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="setor_recebe_id">Setor destinatário</label>

                    <select
                        class="form-control"
                        id="setor_recebe_id"
                        name="setor_recebe_id"
                        required
                        disabled
                    >
                        <option value=""></option>
                    </select>
                </div>

                <div class="mb-3">
                    <button
                        class="btn btn-success"
                        type="submit"
                    >
                        Tramitar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function () {
            $('#setor_envio_id').change(function () {
                let selecionado = $(this).val();

                if (selecionado) {
                    $('#setor_recebe_id').removeAttr('disabled');
                } else {
                    $('#setor_recebe_id').attr('disabled', 'disabled');
                }

                $.ajax({
                    url: '/tramitacao/setor',
                    method: 'GET',
                    data: {selecionado},
                    dataType: 'JSON',
                    success: function (response) {
                        let html = '<option value=""></option>';

                        response.map((item) => {
                            html += `<option value="${item.id}">${item.descricao}</option> `;
                        });

                        $("#setor_recebe_id").html(html);
                    }
                })
            });
        })
    </script>
@endsection


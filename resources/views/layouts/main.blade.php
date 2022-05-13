<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Controle de envio de documentos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Boostrap v5 --}}
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    {{-- Jquery --}}
    <script src="/assets/js/jquery.min.js"></script>

    {{-- Jquery Confirm --}}
    <link rel="stylesheet" href="/assets/css/jquery-confirm.min.css">
    <script src="/assets/js/jquery-confirm.min.js"></script>
</head>
<body class="antialiased">
<style>
    body {
        background-color: rgba(253, 253, 253, 0.95);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Solasstec</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Início</a>
                <a class="nav-link" href="/setor">Setor</a>
                <a class="nav-link" href="/tipo_documento">Tipo de documento</a>
                <a class="nav-link" href="/documento">Documentos</a>
                <a class="nav-link" href="/tramitacao">Tramitação</a>
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="container-fluid">
        @if(session('msg'))
            <div class="alert alert-success my-4" role="alert">
                {{session('msg')}}
            </div>
        @endif

        @yield('content')
    </div>
</main>
</body>
</html>

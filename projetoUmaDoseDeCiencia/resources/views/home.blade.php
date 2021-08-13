@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bem-Vindo') }}, {{ Auth::user()->name}}!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Você está Logado!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id='postar'>
    <a href="/eventos">
        <button type="button" class="btn btn-primary ml-5"><h1>Cadastrar Evento</h1></button>
    </a>
    <a href="/artigos">
        <button type="button" class="btn btn-primary ml-5"><h1>Submeter Artigo</h1></button>
    </a>
</div>

<div id='visualizar'>
    <a href="/visualizar_eventos">
        <button type="button" class="btn btn-primary ml-5"><h1>Visualizar Eventos</h1></button>
    </a>
    <a href="/visualizar_artigos">
        <button type="button" class="btn btn-primary ml-5"><h1>Visualizar Artigos</h1></button>
    </a>
</div>
@endsection
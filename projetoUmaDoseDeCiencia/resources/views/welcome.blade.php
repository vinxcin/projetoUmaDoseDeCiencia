@extends('layouts.main')
@section('title', 'Uma Dose De Ciência')
@section('content')

    <div id='models'>
        <div class='postar'>
            <a href="/events/create">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Criar Evento</h1>
                </button>
            </a>
            <a href="/artigos">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Submeter Artigo</h1>
                </button>
            </a>
        </div>

        <div class='visualizar'>
            <a href="/events/show">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Visualizar Eventos</h1>
                </button>
            </a>
            <a href="/artigo/show">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Visualizar Artigos</h1>
                </button>
            </a>
        </div>
    <div>

@endsection
@extends('layouts.main')
@section('title', 'Uma Dose De Ciência')
@section('content')
@auth
<div id="auth-create">
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
</div>
<div id="auth-view">
        <div class='visualizar'>
            <a href="/events/show">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Visualizar meus eventos</h1>
                </button>
            </a>
            <a href="/artigo/show">
                <button type="button" class="btn btn-primary ml-5">
                    <h1>Visualizar meus artigos</h1>
                </button>
            </a>
        </div>
    </div>
</div>
@endauth
@guest
<div id="guest">
    <div class='visualizar'>
        <a href="/events/show">
            <button type="button" class="btn btn-primary ml-5 mt-5">
                <h1>Visualizar Eventos</h1>
            </button>
        </a>
        <a href="/artigo/show">
            <button type="button" class="btn btn-primary ml-5 mt-5">
                <h1>Visualizar Artigos</h1>
            </button>
        </a>
    </div>
</div>
@endguest
@endsection
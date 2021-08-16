<!-- IMPRIME "SHOW" TODOS OS EVENTOS QUE FORAM CADASTRADOS -->
@extends('layouts.bootstrap')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/atomo.png" type="image/x-icon">
    <title>Meus Eventos</title>
</head>

@section('content')
<link rel="stylesheet" href="/css/showEvento.css">

<div id="search-container" class="col-md-5 busca">
    <h1>BUSQUE UM EVENTO</h1>
    <form action="/events/show/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>

</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    
    @endif
    <div id="cards-container" class="row">
        @foreach($eventos as $event)
        <div class="card col-md-3 ml-5 block">
            <img src="/img/event.png" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y') , strtotime($event->date)}}</p>
                <!--VAI PEGAR A DATA DO BANCO DE DADOS EM QUE O EVENTO FOI CADASTRADO -->
                <h5 class="card-title">{{ $event->title }}</h5>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
        </div>

        @endforeach
        @if(count($eventos) == 0)
        <link rel="stylesheet" href="/css/teste.css">
        <div class="eventos-indisponiveis">
            <p>Não há eventos disponiveis!</p>
            <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
        </div>
        @endif
    </div>
</div>
<div>
        <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
        </div>

@if(count($eventos) == 0 || count($eventos) <= 3 ) <link rel="stylesheet" href="/css/teste.css">
    <footer>
        <!--footer é a barra que fica no final da página -->
        <p>Uma Dose de Ciência &copy; 2021</p>
    </footer>
    @else
    <footer>
        <!--footer é a barra que fica no final da página -->
        <p>Uma Dose de Ciência &copy; 2021</p>
    </footer>
    @endif
    @endsection
<!-- IMPRIME "SHOW" TODOS OS EVENTOS QUE FORAM CADASTRADOS -->
@extends('layouts.bootstrap')

@section('content')
<link rel="stylesheet" href="/css/show.css">

<div id="search-container" class="col-md-5 busca">
    <h1>BUSQUE UM ARTIGO</h1>
    <form action="/artigos/show" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>

</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <br>
    <h3>OUTROS ARTIGOS</h3>
    <p class="subtitle">Veja os artigos postados</p>
    <br>
    <br>
    @endif
    @foreach($artigos as $artigo)
    <div id="cards-container" class="row">
    <div class="">
		<main id="card-artigo">
			<!--conteudo principal -->
            <div class="card-artigo">
                <h3><b>{{ $artigo->title }}</b></h3>
                <br>
                <h4>Autor - {{$artigo->name}}</h4>
                <p>
                    {{ $artigo->subject}}
                </p>
            </div>
        </main>
        <!-- <div class="card col-md-3 ml-5 block">
            <div class="card-body">
                VAI PEGAR A DATA DO BANCO DE DADOS EM QUE O EVENTO FOI CADASTRADO 
                <h5 class="card-title">{{ $artigo->title }}</h5>
                <p class="card-participants">Autor do artigo {{ $artigo->name}}</p>
            </div>
        </div>
         -->
        @endforeach
        @if(count($artigos) == 0)
        <link rel="stylesheet" href="/css/teste.css">
        <div class="eventos-indisponiveis">
            <p>Não há artigos disponiveis!</p>
        </div>
        @endif
    </div>
</div>


@if(count($artigos) == 0 || count($artigos) < 1 ) <link rel="stylesheet" href="/css/teste.css">
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
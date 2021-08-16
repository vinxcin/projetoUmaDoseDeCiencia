@extends('layouts.bootstrap')
@section('content')
@auth
<link rel="stylesheet" href="/css/create.css">
<br>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 text-align="center">Editando: {{ $artigos->title }}</h1>
    <form action="/artigos/update/{{ $artigos->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <b>
                <label for="name">Nome do autor </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do autor" value="{{ $artigos->name }}">

                <div class="form-group">
                    <label for="title">Titulo </label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titulo do artigo" value="{{ $artigos->title }}">
                </div>
                
                <div class="form-group">
                    <label for="subject">Descrição</label>
                    <textarea name="subject" id="subject" class="form-control" placeholder="Escreva o seu artigo aqui!" value="{{ $artigos->subject }}"></textarea>
                </div>
            </b>

            <input type="submit" class="btn btn-primary" value="Editar Artigo">
    </form>
</div>
<br>
<footer>
    <!--footer é a barra que fica no final da página -->
    <p>Uma Dose de Ciência &copy; 2021</p>
</footer>
@endauth
@guest
<H1>VOCÊ NÃO ESTÁ LOGADO!</H1>
@endguest
@endsection
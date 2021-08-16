@extends('layouts.bootstrap')
@section('content')
@auth
<link rel="stylesheet" href="/css/create.css">
<br>
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 text-align="center">CRIE O SEU EVENTO</h1>
    <form action='/events' method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <b>
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">

                <div class="form-group">
                    <label for="date">Data do evento: </label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="title">Plataforma:</label>
                    <input type="text" class="form-control" id="plataform" name="plataform" placeholder="Plataforma do Evento">
                </div>
                <div class="form-group">
                    <label for="title">O evento é privado?</label>
                    <select name="private" id="private" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
                </div>
            </b>

            <input type="submit" class="btn btn-primary" value="Criar Evento">
            <button class="btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
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
@extends('layouts.bootstrap')
<link rel="stylesheet" href="/css/dash.css">

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Artigos</h1>
   
</div>
<div class="col-md-10 offset-md-1 dashboard-eventos-container">
    @if(count($artigos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Artigo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($artigos as $artigo)
            <tr>
                <td scropt="row">{{ $loop->index + 1}}</td>
                <td><a href="/artigo/{{ $artigo->id }}">{{ $artigo->title }}</a></td>
                <td>
                    <a href="/artigos/edit/{{ $artigo->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon>Editar
                    </a>
                    
                    <form action="/artigos/{{ $artigo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>Delete</button>
                            
                    </form>
                        
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
    @else
    <p>Você ainda não tem eventos, <a href="/artigos/create">criar artigo</a></p>
    <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
    @endif
</div>
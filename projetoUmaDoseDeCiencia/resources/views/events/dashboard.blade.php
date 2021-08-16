@extends('layouts.bootstrap')

<link rel="stylesheet" href="/css/dash.css">
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-eventos-container">
    @if(count($eventos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Evento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($eventos as $event)
            <tr>
                <td scropt="row">{{ $loop->index + 1}}</td>
                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>
                    <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon>Editar
                    </a>
                    <form action="/events/{{ $event->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>Delete</button>
                            <div class="modal" tabindex="-1">
 
                    </form>
                    <button class="btn btn-primary" value="Voltar"><a href="/">Voltar</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
    @else
    <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
    <button class=" btn btn-dark" value="Voltar"><a href="/">Voltar</a></button>
    @endif
</div>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento; //CONECTA COM A TABELA EVENTOS

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;

        $evento->title       =  $request->title;
        $evento->date        =  $request->date;
        $evento->plataform   =  $request->plataform;
        $evento->private     =  $request->private;
        $evento->description =  $request->description;

        $evento-> save();

        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show()
    {
        $eventos = Evento::all(); //ESTÁ PEGANDO TODOS OS EVENTOS QUE JÁ FORAM CADASTRADOS NO BANCO DE DADOS


        return view('events.viewEvents', ['eventos' => $eventos]); //está retornando na view todos os eventos que foram cadastrados
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

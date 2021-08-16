<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento; //CONECTA COM A TABELA EVENTOS
use App\Models\User;

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

        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save();

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

        $search =  request('search');

        if ($search) {
            $eventos = Evento::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $eventos = Evento::all();  //ESTÁ PEGANDO TODOS OS EVENTOS QUE JÁ FORAM CADASTRADOS NO BANCO DE DADOS
        }

        return view('events.viewEvents', ['eventos' => $eventos, 'search' => $search]); //está retornando na view todos os eventos que foram cadastrados

    }

    //  public function show($id) {

    //     $eventos = Evento::findorFail($id);

    //     $eventsOwner = User::where('id', $eventos->user_id)->first()->toArray();

    //     return view('events.viewEvents', ['eventos' => $eventos, 'eventsOwner' => $eventsOwner]);

    //  }

    public function dashboard()
    {

        $user = auth()->user();

        $eventos = $user->eventos;

        return view('events.dashboard', ['eventos' => $eventos]);
    }

    public function edit($id) {

        $eventos = Evento::findOrFail($id);

        return view('events.edit', ['eventos' => $eventos]);
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
        Evento::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard')
            ->with('msg', 'Evento editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();

        return redirect('/dashboard')
            ->with('msg', 'Evento excluído com sucesso!');
    }
}

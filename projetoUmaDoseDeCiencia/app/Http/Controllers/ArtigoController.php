<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artigo;
use App\Models\User;

class ArtigoController extends Controller
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
        return view('artigos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artigo = new Artigo;

        $artigo->name     =  $request->name;
        $artigo->title    =  $request->title;
        $artigo->subject  =  $request->subject;
        

        $user = auth()->user();
        $artigo->user_id = $user->id;

        $artigo->save();

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
            $artigos = Artigo::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $artigos = Artigo::all();  //ESTÁ PEGANDO TODOS OS EVENTOS QUE JÁ FORAM CADASTRADOS NO BANCO DE DADOS
        }

        return view('artigos.viewArtigos', ['artigos' => $artigos, 'search' => $search]); 
    }

    public function dashboard()
    {

        $user = auth()->user();

        $artigos = $user->artigos;

        return view('artigos.dashboard', ['artigos' => $artigos]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $artigos = Artigo::findOrFail($id);

        return view('artigos.edit', ['artigos' => $artigos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Artigo::findOrFail($request->id)->update($request->all());

        return redirect('/dashboard_Artigos')
            ->with('msg', 'Artigo editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artigo::findOrFail($id)->delete();

        return redirect('/dashboard_Artigos')
            ->with('msg', 'Artigo excluído com sucesso!');
    }
}

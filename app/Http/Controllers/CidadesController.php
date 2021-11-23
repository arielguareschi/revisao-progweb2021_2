<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::all();
        return view('cidade.lista', compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cidade.formulario");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade($request->all());
        if ($cidade->save()){
            // cidade salva com sucesso
            $request->session()->flash('mensagem_sucesso', 'Cidade salva com sucesso');
        } else {
            // cidade deu erro no salvar
            $request->session()->flash('mensagem_erro', 'ERRO ao salvar a cidade!');
        }
        return Redirect::to('cidades/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        return view('cidade.mostrar', compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        return view('cidade.formulario', compact('cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::find($cidade->id);
        $cidade->fill($request->all());
        if ($cidade->save()){
            // cidade salva com sucesso
            $request->session()->flash('mensagem_sucesso', 'Cidade salva com sucesso');
        } else {
            // cidade deu erro no salvar
            $request->session()->flash('mensagem_erro', 'ERRO ao salvar a cidade!');
        }
        return Redirect::to('cidades/'.$cidade->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cidade $cidade)
    {
        $cidade = Cidade::findOrFail($cidade->id);
        if ($cidade->delete()){
            // cidade salva com sucesso
            $request->session()->flash('mensagem_sucesso', 'Cidade salva com sucesso');
        } else {
            // cidade deu erro no salvar
            $request->session()->flash('mensagem_erro', 'ERRO ao salvar a cidade!');
        }
        return Redirect::to('cidades');
    }
}

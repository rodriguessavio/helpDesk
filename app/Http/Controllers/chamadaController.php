<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamada;

class chamadaController extends Controller
{
    public function index() {
        $search = request('search');

        if($search){
            $chamadas = Chamada::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }else {
            $chamadas = Chamada::all();
        }
        

        return view('welcome', ['chamadas' => $chamadas, 'search' => $search]);
    }

    public function create() {
        return view('chamadas.create');
    }

    public function store(Request $request) {

        $chamada = new Chamada();
        $chamada->titulo = $request->titulo;
        $chamada->duracao = $request->duracao;
        $chamada->urgencia = $request->urgencia;

        $chamada->save();

        return redirect('/')->with('msg', 'Chamada criada com sucesso');

    }

    public function show($id){

        $chamada = Chamada::findOrFail($id);

        return view('chamadas.show', ['chamada' => $chamada]);

    }


}

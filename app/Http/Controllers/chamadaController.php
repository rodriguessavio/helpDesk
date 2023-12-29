<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamada;

class chamadaController extends Controller
{
    public function index() {
        $search = request('search');

        $user = auth()->user();

        if ($user->role == 'user') {
            $chamadasQuery = Chamada::where('user_id', $user->id);
        } else {
            $chamadasQuery = Chamada::query();
        }

        if ($search) {
            $chamadasQuery->where('titulo', 'like', '%'.$search.'%');
        }
        
        $chamadas = $chamadasQuery->get();

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
        $chamada->descricao = $request->descricao;
        // $chamada->status = $request->status;
        $chamada->maquina = $request->maquina;

        //image upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
          
            $requestImage = $request->image;
  
            $extension = $requestImage->extension();
  
            $imageName = md5($requestImage->getClientOriginalName() . strtotime(("now")) . "." . $extension);
  
            $requestImage->move(public_path('img/chamadas'), $imageName);
            
            $chamada->image = $imageName;
  
        }

        $user = auth()->user();
        $chamada->user_id = $user->id;

        $chamada->save();

        return redirect('/')->with('msg', 'Chamada criada com sucesso');


    }

    public function show($id){

        $chamada = Chamada::findOrFail($id);

        return view('chamadas.show', ['chamada' => $chamada]);

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamada;
use App\Models\User;

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

        $donoChamada = User::where('id', $chamada->user_id)->first()->toArray();

        return view('chamadas.show', ['chamada' => $chamada, 'donoChamada' => $donoChamada]);

    }

    public function destroy($id) {

        Chamada::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Chamada deletada com sucesso!');

    }

    public function edit($id) {

        $chamada = Chamada::findOrFail($id);

        return view('chamadas.edit', ['chamada'=> $chamada]);

    }

    public function update(Request $request) {

        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
          
            $requestImage = $request->image;
  
            $extension = $requestImage->extension();
  
            $imageName = md5($requestImage->getClientOriginalName() . strtotime(("now")) . "." . $extension);
  
            $requestImage->move(public_path('img/chamadas'), $imageName);
            
            $data['image'] = $imageName;
  
        }

        Chamada::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Chamada alterada com sucesso!');

    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chamada;

class chamadaController extends Controller
{
    public function index() {
        $chamadas = Chamada::all();

        return view('welcome', ['chamadas' => $chamadas]);
    }

    public function create() {
        return view('chamadas.create');
    }


}

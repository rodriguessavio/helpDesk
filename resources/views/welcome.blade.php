@extends('layouts.main')
@section('title', 'Helpdesk')
@section('content')
<!-- <h1>Chamadas</h1> -->

    <div id="search-container" class="col-md-12">
        <h1>Busque uma chamada</h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="chamadas-container" class="col-md-12">
        <h2>Veja todos as chamadas</h2>
        <div id="cards-container" class="row">
            @foreach($chamadas as $x)
                <div class="card col-md-3">
                    <img src="/img/pc-quebrado.jpg">
                    <div class="card-body">
                        <p class="card-date">10/09/2023</p>
                        <h5 class="card-title">{{ $x->titulo }}</h5>
                        <p class="card-duracao"> {{ $x->duracao }} </p>
                        <a href="#" class="btn btn-primary"> Saber mais!</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

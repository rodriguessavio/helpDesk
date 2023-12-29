@extends('layouts.main')

@section('title', 'Editando: '. $chamada->titulo)

@section('content')

<a href="/">Voltar para a Home</a>

<div id="chamada-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $chamada->titulo }}</h1>

    <form action="/chamadas/update/{{$chamada->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Pc: </label>
            <input type="file" id="image" name="image" class="form-control-file"> 
            <img src="/img/chamadas/{{ $chamada->image }}" alt="" class="img-preview">
        </div> 

        <div class="form-group">
            <label for="">Nome da chamada: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome da chamada" value="{{ $chamada->titulo }}">    
        </div>

        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <input name="descricao" id="descricao" class="form-control"  value="{{ $chamada->descricao }}">
        </div>

        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input type="time" class="form-control" id="duracao" name="duracao" placeholder="Duração da chamada" value="{{ $chamada->duracao }}">    
        </div>

        <div class="form-group">
            <label for="maquina">Maquina:</label>
            <input type="text" class="form-control" id="maquina" name="maquina" placeholder="Configuração da máquina" value="{{ $chamada->maquina }}">    
        </div>

        <br>

        <div class="form-group">
            <label for="urgencia">Urgência: </label> <br>
            <select name="urgencia" id="urgencia">
                <option value="0" {{ $chamada->urgencia == 0 ? 'selected' : '' }}>Baixa urgência</option>
                <option value="1" {{ $chamada->urgencia == 1 ? 'selected' : '' }}>Média urgência</option>
                <option value="2" {{ $chamada->urgencia == 2 ? 'selected' : '' }}>Alta urgência</option>
            </select>
        </div>

        @if(auth()->user()->role != 'user')
            <div class="form-group">
                <label for="status">Status: </label> <br>
                <select name="status" id="status">
                    <option value="pendente" {{ $chamada->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="Sendo feito" {{ $chamada->status == 'Sendo feito' ? 'selected' : '' }}>Sendo feito</option>
                    <option value="Feito" {{ $chamada->status == 'Feito' ? 'selected' : '' }}>Feito</option>
                </select>
            </div>
        @endif

        <br>

        <input type="submit" class="btn btn-primary" value="Editar chamada">

    </form>
</div>

@endsection
@extends('layouts.main')

@section('title', 'Criar chamada')

@section('content')

<a href="/">Voltar para a Home</a>

<div id="chamada-create-container" class="col-md-6 offset-md-3">
    <h1>Crie uma chamada</h1>

    <form action="/chamadas" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nome da chamada: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome da chamada">    
        </div>

        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input type="time" class="form-control" id="duracao" name="duracao" placeholder="Duração da chamada">    
        </div>

        <br>

        <div class="form-group">
            <label for="">Urgência: </label> <br>
            <select name="urgencia" id="urgencia">
                <option value="0">Baixa urgência</option>
                <option value="1">Média urgência</option>
                <option value="2">Alta urgência</option>
            </select>
        </div>

        <br>

        <input type="submit" class="btn btn-primary" value="Criar chamada">

    </form>
</div>

@endsection
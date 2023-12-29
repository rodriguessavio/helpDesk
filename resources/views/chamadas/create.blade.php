@extends('layouts.main')

@section('title', 'Criar chamada')

@section('content')

<a href="/">Voltar para a Home</a>

<div id="chamada-create-container" class="col-md-6 offset-md-3">
    <h1>Crie uma chamada</h1>

    <form action="/chamadas" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="image">Imagem do Pc: </label>
            <input type="file" id="image" name="image" class="form-control-file"> 
        </div> 

        <div class="form-group">
            <label for="">Nome da chamada: </label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome da chamada">    
        </div>

        <div class="form-group">
            <label for="descricao">Descricao:</label>
            <textarea name="descricao" id="descricao" class="form-control" cols="30" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input type="time" class="form-control" id="duracao" name="duracao" placeholder="Duração da chamada">    
        </div>

        <div class="form-group">
            <label for="maquina">Maquina:</label>
            <input type="text" class="form-control" id="maquina" name="maquina" placeholder="Configuração da máquina">    
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
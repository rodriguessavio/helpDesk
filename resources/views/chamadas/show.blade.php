@extends('layouts.main')

@section('title', $chamada->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id= "image-container" class="col-md-10 offset-md-1">
                <img src="/img/chamadas/{{ $chamada->image}}" class="img-fluid" alt="">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $chamada->titulo}}</h1>
                <p class="chamada-duracao">
                <ion-icon name="time-outline"></ion-icon> {{ $chamada->duracao}}
                </p>
                <p class="chamada-urgencia">
                @if($chamada->urgencia == 0)
                <ion-icon name="radio-outline"></ion-icon> <span>Baixa urgência</span>
                @elseif($chamada->urgencia == 1)
                <ion-icon name="radio-outline"></ion-icon> <span>Média urgência</span>
                @elseif($chamada->urgencia == 2)
                <ion-icon name="radio-outline"></ion-icon> <span>Alta urgência</span>
                @endif

                </p>
                <p class="chamada-descricao">
                    Descricao: <br>{{ $chamada->descricao}}
                </p>
                @if ($chamada->status == 'pendente')
                    <span style="
                    background-color: red;
                    color:#fff;
                    width: 10%;
                    padding: 2px;
                    ">
                         {{ $chamada->status }}
                    </span>
                @endif
                <br>
                <br>
                <ion-icon name="desktop-outline"></ion-icon> <span class="chamada-descricao">{{ $chamada->maquina }}</span>
            </div>
        </div>
    </div>

@endsection

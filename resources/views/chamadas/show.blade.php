@extends('layouts.main')

@section('title', $chamada->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="info-container" class="col-md-6">
                <h1>{{ $chamada->titulo}}</h1>
                <p class="chamada-duracao">
                <ion-icon name="time-outline"></ion-icon> {{ $chamada->duracao}}
                </p>
                <p class="chamada-urgencia">
                <ion-icon name="radio-outline"></ion-icon> {{ $chamada->urgencia}}
                </p>
            </div>
        </div>
    </div>

@endsection

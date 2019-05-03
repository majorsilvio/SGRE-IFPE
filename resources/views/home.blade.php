@extends('layouts.app')

@section('content')
<div class="container">
    <div class="list-group">
        <h3 class="list-group-item list-group-item-action active">O QUE DESEJA FAZER</h3>
        <a href="{{route('equipamento')}}" class="list-group-item list-group-item-action">
            <h3>CADASTRAR EQUIPAMENTO</h3>
        </a>
        <a href="{{route('reserva')}}" class="list-group-item list-group-item-action">
            <h3>RESERVAR EQUIPAMENTO</h3>
        </a>
    </div>
</div>

@endsection


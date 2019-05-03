@extends('layouts.app')

@section('content')

<div>
    <form action="" method="" class="form-group">
        @csrf
        <div class="row">
            <div class="col">
                <label>equipamento</label>
                <select class="custom-select">
                    <option selected disabled>selecione o equipamento</option>
                    @foreach($equipamentos as $equipamento)
                    <option>{{$equipamento->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>data</label>
                <input class="form-control" type="date" name="data">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>HORA DE ÍNICIO</label>
                <input class="form-control" type="time" name="hora_inicio">
            </div>
            <div class="col">
                <label>HORA DE TÉRMINO</label>
                <input class="form-control" type="time" name="hora_fim">
            </div>
        </div>

        <input class="form-control mt-3" type="submit" value="Reservar equipamento">
    </form>
</div>
<div class="container mt-3">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Equipamento</th>
                <th scope="col">Usuario</th>
                <th scope="col">Data</th>
                <th scope="col">Hora de inicio</th>
                <th scope="col">Hora de termino</th>
            </tr>
        </thead>
        @foreach($reservas as $reserva)
        <tr>
            <th class="row">{{$reserva->id}}</th>
            <td>{{$reserva->nome}}</td>
            <td>{{$reserva->name}}</td>
            <td>{{$reserva->data_reserva}}</td>
            <td>{{$reserva->hora_inicio}}</td>
            <td>{{$reserva->hora_fim}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

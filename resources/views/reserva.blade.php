@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('reserva_cadastro')}}" method="POST" class="form-group">
        @csrf
        <div class="row">
            <div class="col">
                <label>EQUIPAMENTO <i style="color: red">*</i></label>
                <select class="custom-select" name="equipamento">
                    <option selected disabled>selecione o equipamento</option>
                    @foreach($equipamentos as $equipamento)
                    <option value="{{$equipamento->id}}">{{$equipamento->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>DATA DA RESERVA <i style="color: red">*</i></label>
                <input class="form-control" type="date" name="data_reserva" onkeypress="return false">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>HORA DE ÍNICIO <i style="color: red">*</i></label>
                <input class="form-control" type="time" name="hora_inicio">
            </div>
            <div class="col">
                <label>HORA DE TÉRMINO <i style="color: red">*</i></label>
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
                <th scope="col">Equipamento</th>
                <th scope="col">Usuario</th>
                <th scope="col">Data</th>
                <th scope="col">Hora de inicio</th>
                <th scope="col">Hora de termino</th>
                <th scope="col">Excluir</th>
                <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
            <tr>
                <td>{{$reserva->nome}}</td>
                <td>{{$reserva->name}}</td>
                <td>{{$reserva->data_reserva}}</td>
                <td>{{$reserva->hora_inicio}}</td>
                <td>{{$reserva->hora_fim}}</td>
                <td><a href="{{route('excluir_reserva',$reserva->id)}}"><i class="fas fa-trash-alt"></i></a></td>
                <td><a href="{{route('editar_reserva',$reserva->id)}}"><i class="fas fa-edit"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

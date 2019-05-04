@extends('layouts.app')
{{-- {{dd($reserva)}} --}}
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
    <form action="{{route('update_reserva',$reserva[0]->id)}}" method="POST" class="form-group">
        @csrf
        <div class="row">
            <div class="col">
                <label>EQUIPAMENTO <i style="color: red">*</i></label>
                <select class="custom-select" name="equipamento">
                    <option disabled>selecione o equipamento</option>
                    @foreach($equipamentos as $equipamento)
                    @if($equipamento->id == $reserva[0]->equipamento_id)
                    <option value="{{$equipamento->id}}" selected>{{$equipamento->nome}}</option>
                    @else
                    <option value="{{$equipamento->id}}">{{$equipamento->nome}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label>DATA DA RESERVA <i style="color: red">*</i></label>
                <input class="form-control" type="date" name="data_reserva" onkeypress="return false" value="{{$reserva[0]->data_reserva}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>HORA DE ÍNICIO <i style="color: red">*</i></label>
                <input class="form-control" type="time" name="hora_inicio" value="{{$reserva[0]->hora_inicio}}">
            </div>
            <div class="col">
                <label>HORA DE TÉRMINO <i style="color: red">*</i></label>
                <input class="form-control" type="time" name="hora_fim" value="{{$reserva[0]->hora_fim}}">
            </div>
        </div>

        <input class="form-control mt-3" type="submit" value="Reservar equipamento">
    </form>
</div>



@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div>
    <h1>EQUIPAMENTO</h1>
    <form action="" method="" class="form-group">
        @csrf
        <label>NOME</label>
        <input class="form-control" type="text" name="nome" >
        <label>TIPO</label>
        <input class="form-control" type="text" name="tipo">
        <input class="form-control" type="submit" value="Cadastrar Equipamento">
    </form>
    </div>
<div>
    <h1>RESERVAR EQUIPAMENTO</h1>
    <form action="" method="" class="form-group">
        @csrf
        <label>equipamento</label>
        <select class="custom-select">
            <option selected disabled>selecione o equipamento</option>
            
        </select>
        <label>data</label>
        <input class="form-control" type="date" name="data">
        <label>HORA DE ÍNICIO</label>
        <input class="form-control" type="time" name="hora_inicio">
        <label>HORA DE TÉRMINO</label>
        <input class="form-control" type="time" name="hora_fim">
        <input class="form-control" type="submit" value="Reservar equipamento">
    </form>
</div>
</div>
@endsection

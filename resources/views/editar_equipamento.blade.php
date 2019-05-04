@extends('layouts.app')

@section('content')

<div class="container">
	<form action="{{route('update_cadastro',$equipamento[0]->id)}}" method="POST">
		@csrf
		<div class="row">
			<div class="col">
				<label class="mx-auto">NOME <i style="color: red">*</i></label>
				<input class="form-control" type="text" name="nome" value="{{$equipamento[0]->nome}}" >
			</div>
			<div class="col">
				<label>TIPO <i style="color: red">*</i></label>				
				<input class="form-control" type="text" name="tipo" value="{{$equipamento[0]->tipo}}">
			</div>
		</div>
		<input class="form-control mt-3" type="submit" value="Cadastrar Equipamento">
	</form>
</div>


@endsection
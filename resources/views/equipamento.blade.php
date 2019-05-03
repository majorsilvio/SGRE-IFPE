@extends('layouts.app')

@section('content')
<div class="container">
	<form action="" method="">
		@csrf
		<div class="row">
			<div class="col">
				<label class="mx-auto">NOME</label>
				<input class="form-control" type="text" name="nome" >
			</div>
			<div class="col">
				<label>TIPO</label>				
				<input class="form-control" type="text" name="tipo">
			</div>
		</div>
		<input class="form-control mt-3" type="submit" value="Cadastrar Equipamento">
	</form>
</div>

<div class="container mt-3">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">Tipo</th>
			</tr>
		</thead>
		@foreach($equipamentos as $equipamento)
		<tr>
			<th class="row">{{$equipamento->id}}</th>
			<td>{{$equipamento->nome}}</td>
			<td>{{$equipamento->tipo}}</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
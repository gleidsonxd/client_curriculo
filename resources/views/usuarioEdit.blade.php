@extends('layouts.blank-page')
@section('content')

<?php 
$usuario = json_decode($result);
//var_dump($usuario);
?>
<style>

</style>

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/usuarios/{{ $usuario->id }}" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$usuario->name}}" >
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{$usuario->cpf}}" >
                <label for="tel">Telefone</label>
                <input type="text" class="form-control" name="tel" id="tel" value="{{$usuario->tel}}" >
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}" >{{-- email --}}
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
        </form>
    </div>    
</div>
 <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/usuarios/{{ $usuario->id }}" method="POST"> 
        	<input type="hidden" name="usuarioid" value="{{ $usuario->{'id'} }}">
			<button class="btn btn-lg btn-danger btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
			<input type="hidden" value="DELETE" name="_method">
	    </form>
    </div>
</div>

@endsection
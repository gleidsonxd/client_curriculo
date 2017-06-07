@extends('layouts.blank-page')
@section('content')

<?php 
$usuario = json_decode($result);
#var_dump($usuario);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$usuario->name}}" readonly="readonly">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{$usuario->cpf}}" readonly="readonly">
                <label for="tel">Telefone</label>
                <input type="text" class="form-control" name="tel" id="tel" value="{{$usuario->tel}}" readonly="readonly">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$usuario->email}}" readonly="readonly">{{-- email --}}
                
            </div>
        </form>
    </div>    
</div>
 <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="\editar_usuario" method="POST"> 
        	<input type="hidden" name="usuarioid" value="{{ $usuario->{'id'} }}">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
			
	    </form>
    </div>
</div>

@endsection
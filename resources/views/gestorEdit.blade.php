@extends('layouts.blank-page')
@section('content')

<?php 
$gestor = json_decode($result);
#var_dump($gestor);
?>
<style>

</style>

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/gestors/{{ $gestor->id }}" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$gestor->name}}">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$gestor->email}}">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
        </form>
    </div>    
</div>
 <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/gestors/{{ $gestor->id }}" method="POST"> 
        	<input type="hidden" name="gestorid" value="{{ $gestor->{'id'} }}">
			<button class="btn btn-lg btn-danger btn-block" type="submit" style="margin-top:10px;width:150px;">Deletar</button>
			<input type="hidden" value="DELETE" name="_method">
	    </form>
    </div>
</div>

@endsection
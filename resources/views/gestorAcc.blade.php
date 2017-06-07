@extends('layouts.blank-page')
@section('content')

<?php 
$gestor = json_decode($result);
#var_dump($gestor);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$gestor->name}}" readonly="readonly">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$gestor->email}}" readonly="readonly">
                {{-- email --}}
            </div>
        </form>
    </div>    
</div>
 <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="\editar_gestor" method="POST"> 
        	<input type="hidden" name="gestorid" value="{{ $gestor->{'id'} }}">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
			
	    </form>
    </div>
</div>

@endsection
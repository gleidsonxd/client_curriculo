@extends('layouts.blank-page')
@section('content')

<?php 
$gestor = json_decode($result);
//var_dump($usuario);
?>
<style>

</style>

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/gestorspass/{{ $gestor->id }}" method="POST">
            <div class="form-group">
                {{-- <label for="oldpass">Antiga senha</label>
                <input type="password" class="form-control" name="oldpass" id="oldpass" > --}}
                <label for="newpass">Nova senha</label>
                <input type="password" class="form-control" name="newpass" id="newpass" >
                
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:10px;width:150px;">Atualizar</button>
			<input type="hidden" value="PUT" name="_method">
        </form>
    </div>    
</div>
 
@endsection
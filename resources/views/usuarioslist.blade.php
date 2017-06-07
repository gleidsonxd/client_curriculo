@extends('layouts.blank-page')
@section('content')

<?php 
$usuarios = json_decode($result);
#var_dump($usuarios);
?>
<style>
.list-group {
    padding-left: 20%;
    padding-right: 20%;
}
</style>
<div class="list-group">
    <a href="#" class="list-group-item active disabled" style="text-align:center;"> <h4> Lista de Usuarios</h4>   </a>
    @foreach($usuarios as $usuario)
    <a href="\profile/{{$usuario->id}}" class="list-group-item list-group-item-action " >{{$usuario->email}}</a>
    @endforeach
</div>

@endsection
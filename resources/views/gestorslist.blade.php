@extends('layouts.blank-page')
@section('content')

<?php 
$gestors = json_decode($result);
#var_dump($gestors);
?>
<style>
.list-group {
    padding-left: 20%;
    padding-right: 20%;
}
</style>
<div class="list-group">
    <a href="#" class="list-group-item active disabled" style="text-align:center;"> <h4> Lista de Gestores</h4>   </a>
    @foreach($gestors as $gestor)
    <a href="\account/{{$gestor->id}}" class="list-group-item list-group-item-action " >{{$gestor->email}}</a>
    @endforeach
</div>

@endsection
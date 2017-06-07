@extends('layouts.blank-page')
@section('content')


<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form role="form" action="/usuarios" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" name="cpf" id="cpf">
                <label for="tel">Telefone</label>
                <input type="text" class="form-control" name="tel" id="tel">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <button class="btn btn-lg btn-primary btn-block" type="submit"  style="margin-top:10px;">Cadastrar</button>
            </div>
        </form>
    </div>    
</div>


@endsection
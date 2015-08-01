@extends('template.login')


@section('content')

<div class="login-title"><strong>Log In</strong> com a sua conta</div>

    <form class="form-horizontal" method="post">
    <div class="form-group">
        <div class="col-md-12">
            <input type="text" name="email" class="form-control" placeholder="E-mail"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="password" name="password" class="form-control" placeholder="Senha"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6">
            <a href="#" class="btn btn-link btn-block">Esqueceu sua senha?</a>
        </div>
        <div class="col-md-6">
            <button class="btn btn-info btn-block">Log In</button>
        </div>
    </div>
    <div class="login-subtitle">
        Ainda não criou sua conta? <a href="sign-up">Crie agora mesmo!</a>
    </div>
    </form>
</div>

@stop
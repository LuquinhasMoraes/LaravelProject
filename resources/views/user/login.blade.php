<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Investindo </title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>
    
    <section class="background">
        <div class="overlay"></div>
    </section>

    <section id="conteudo-view" class="login">

        <h1>Investindo</h1>
        <span>O nosso gerenciador de investimento</span>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

        <p>Acesse o sistema</p>

        <label for="">
            {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}
        </label>

        <label for="">
            {!! Form::password('password', ['class' => 'input', 'placeholder' => 'Senha']) !!}
        </label>
            
        {!! Form::submit('Entrar', ['class' => 'btn-login']) !!}

        <a href="" class="forget"> Esqueceu sua senha? </a>

        {!! Form::close() !!}

    </section>

</body>
</html>
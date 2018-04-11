@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-user-plus"></i> Cadastro de Usuários
@endsection

@endsection

@section('content-view')

    {{-- {{ dd(session('success')) }} --}}
    @if(session('success'))
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif
    

    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}

        @include('templates.forms.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']  ])
        @include('templates.forms.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']  ])
        @include('templates.forms.input', ['label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']  ])
        @include('templates.forms.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']  ])
        @include('templates.forms.password', ['label' => 'Senha', 'input' => 'password', 'attributes' => ['placeholder' => 'Senha']  ])
        @include('templates.forms.submit', ['input' => 'Cadastrar'])

    {!! Form::close() !!}

@endsection


@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-user-plus"></i> Edição de Usuários
@endsection

@endsection

@section('content-view')

    {{-- {{ dd(session('success')) }} --}}
    @if(session('success'))
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif
    

    {!! Form::model($user, ['route' => ['user.update', $user->id ], 'method' => 'put', 'class' => 'form-padrao']) !!}

        @include('templates.forms.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']  ])
        @include('templates.forms.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']  ])
        @include('templates.forms.input', ['label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']  ])
        @include('templates.forms.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']  ])
        @include('templates.forms.select', ['label' => 'Permissão', 'select' => 'permission', 'values' => ['active', 'disabled']  ])
        @include('templates.forms.submit', ['input' => 'Cadastrar'])

    {!! Form::close() !!}

@endsection


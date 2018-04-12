@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-plus"></i> Cadastro de Grupos
@endsection

@endsection

@section('content-view')
  
    @if(session('success'))
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{  session('success')['message'] }}</p>
        </div>
    @endif

    {!! Form::open(['route' => 'groups.store', 'method' => 'post', 'class' => 'form-padrao' ]) !!}
        
        @include('templates.forms.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Grupo']])
        @include('templates.forms.input', ['label' => 'ID usuario', 'input' => 'user_id', 'attributes' => ['placeholder' => 'Usuario']])
        @include('templates.forms.input', ['label' => 'ID instituição', 'input' => 'instituition_id', 'attributes' => ['placeholder' => 'Instituição']])
        @include('templates.forms.submit', ['input' => 'Cadastrar'])
        
    {!! Form::close() !!}

@endsection
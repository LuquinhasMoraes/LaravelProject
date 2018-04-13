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
        @include('templates.forms.select', ['label' => 'ID usuario', 'select' => 'user_id', 'values' => $user_list])
        @include('templates.forms.select', ['label' => 'ID instituição', 'select' => 'instituition_id', 'values' => $inst_list ])
        @include('templates.forms.submit', ['input' => 'Cadastrar'])
        
    {!! Form::close() !!}

@endsection
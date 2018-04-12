@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-users"></i> Lista de Grupos
@endsection

@endsection

@section('content-view')
  
    @if(session('success'))
        {{-- <div class="alert {{ session('success')['type'] }} "> --}}
            {{-- <p>{{  }}</p> --}}
        </div>
    @endif

    {!! Form::open(['route' => 'groups.store', 'method' => 'post', 'class' => 'form-padrao' ]) !!}
        
        @include('templates.forms.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Grupo']]);

    {!! Form::close() !!}

@endsection
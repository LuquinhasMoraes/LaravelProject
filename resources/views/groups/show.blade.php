@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-users"></i> Grupo: {{ $group->name}} <small> / Instituição: {{ $group->instituition->name }}</small>
@endsection

@endsection

@section('content-view')
  
    @if(session('success'))
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif

    @include('user.list', ['user_list' => $group->users ]);

@endsection

<a href="#" class="float-button" id="open-modal" title="Novo Usuário">
    <i style="margin-top: 10px" class="fa fa-user-plus"></i>
</a>

<div class="overlay"></div>
<section id="usergroup-modal" class="modal">
    
    <header class="header-modal">
        <h3>Adicionar integrantes no grupo: {{ $group->name }}</h3>
    </header>
    
    <article class="body-modal">
        {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
        
        @include('templates.forms.select', ['label' => 'Investidor','select' => 'user_id', 'values' => $users_list])
        @include('templates.forms.submit', ['input' => 'Adicionar']) --}}
        {{-- @include('templates.forms.select', ['label' => 'Investidor','select' => 'name', 'values' => $users_list]) --}}
        {!! Form::close() !!}
    </article>
    
    <footer class="footer-modal">
        <button class="close-modal">Cancelar</button>
    </footer>
    {{-- <label class="modal-close" for="modal_chaves"></label> --}}
</section>


@include('templates/modals/modal-usergroup', $group)

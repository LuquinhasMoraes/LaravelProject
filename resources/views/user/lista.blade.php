@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-user-plus"></i> Lista de Usuários
@endsection

@endsection

@section('content-view')
  
    @if(session('success'))
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif

    @include('user.list', ['user_list' => $users ]);

    <a href=" {{ route('user.create') }} " class="float-button" title="Novo Usuário">
        <i class="fa fa-user-plus"></i>
    </a>

@endsection


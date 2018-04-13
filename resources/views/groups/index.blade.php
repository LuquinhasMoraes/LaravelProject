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

    @include('groups.list', ['list_groups' => $groups])

<a href=" {{ route('groups.create') }} " class="float-button" title="Novo Usuário">
    <i class="fa fa-user-plus"></i>
</a>

@endsection
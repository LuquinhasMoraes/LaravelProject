@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-user-plus"></i> Instituição: {{ $instituition->name }}
@endsection

@endsection

@section('content-view')
  
    @if(session('success'))
    @endif

    @include('groups.list', ['list_groups' => $instituition->groups])

@endsection
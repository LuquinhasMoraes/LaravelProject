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
        <div class="alert {{ session('success')['type'] }} "> --}}
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif

    
    <table class="default-data">
        <thead>
            <tr>
                <th>#</th>
                <th>Integrante</th>
                <th>Permissão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($group->users as $user)
               <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->_permision }}</td>
                    <td>
                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>


    <a href=" {{ route('groups.create') }} " class="float-button" title="Novo Usuário">
        <i class="fa fa-user-plus"></i>
    </a>


@endsection

@include('templates/modals/modal-usergroup', $group)

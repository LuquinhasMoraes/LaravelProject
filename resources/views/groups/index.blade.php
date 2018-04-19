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


<table class="default-data">
    <thead>
        <tr>
            <th>#</th>
            <th>nome</th>
            <th>instituição</th>
            <th>usuário</th>
            <th>ações</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($groups as $group)
        <tr>
            <td>{{ $group->id }}</td>
            <td>{{ $group->name }}</td>
            <td>{{ $group->instituition['name'] }}</td>
            <td>{{ $group->owner['name'] }}</td>
            <td>
                
                {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'DELETE' ]) !!}
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                {!! Form::close() !!}
                
                <a href="{{ route('groups.show', $group->id) }}">Detalhes</a>
                
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>

@endsection

<a href=" {{ route('groups.create') }} " class="float-button" title="Novo Usuário">
    <i class="fa fa-user-plus"></i>
</a>


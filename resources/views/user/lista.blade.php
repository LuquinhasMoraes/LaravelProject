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

    <table class="default-data">
        <thead>
            <tr>
                <th>#</th>
                <th>nome</th>
                <th>cpf</th>
                <th>e-mail</th>
                <th>telefone</th>
                <th>status</th>
                <th>permissão</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($users as $user)
               <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->cpf }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->birth }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>

<a href=" {{ route('user.create') }} " class="float-button" title="Novo Usuário">
    <i class="fa fa-user-plus"></i>
</a>

@endsection


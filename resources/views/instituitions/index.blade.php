@extends('templates.master')

@section('css-view')

@endsection

@section('js-view')

@section('page-title')
    <i class="fa fa-user-plus"></i> Lista de Instituições
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
                <th>ações</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($instituitions as $instituition)
               <tr>
                    <td>{{ $instituition->id }}</td>
                    <td>{{ $instituition->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['instituition.destroy', $instituition->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>

<a href=" {{ route('instituition.create') }} " class="float-button" title="Novo Usuário">
    <i class="fa fa-user-plus"></i>
</a>

@endsection
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
        <div class="alert {{ session('success')['type'] }} ">
            <p>{{ session('success')['message'] }}</p>
        </div>
    @endif

    {!! Form::open(['method' => 'POST', 'class' => 'form-padrao']) !!}
        
    @include('templates.forms.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome da instituição']  ])
    @include('templates.forms.submit', ['input' => 'Cadastrar'])

    {!! Form::close()!!}

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
                            <a href="{{ route('instituition.show', $instituition->id) }}"><i class="far fa-clipboard-list"></i> Detalhes</a>
                        {!! Form::open(['route' => ['instituition.destroy', $instituition->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>

@endsection
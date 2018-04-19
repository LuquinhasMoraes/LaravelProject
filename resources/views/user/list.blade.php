<table class="default-data">
    <thead>
        <tr>
            <th>#</th>
            <th>nome</th>
            <th>cpf</th>
            <th>e-mail</th>
            <th>telefone</th>
            <th>permissão</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($user_list as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mask_cpf }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->permission }}</td>
                <td>
                    {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE' ]) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                    {!! Form::close() !!}
                    
                    <a href="{{ route('user.edit', $user->id) }}" class="btn-edit"> <i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        @endforeach
    
    </tbody>
</table>
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
            
            @foreach ($list_groups as $group)
               <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->instituition->name }}</td>
                    <td>{{ $group->user->name }}</td>
                    <td>

                        {!! Form::open(['route' => ['groups.destroy', $group->id], 'method' => 'DELETE' ]) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-list-rm']) !!}
                        {!! Form::close() !!}

                    <a href="{{ route('groups.show', $group->id) }}" class="btn-details">Detalhes</a>

                    </td>
                </tr>
            @endforeach
       
        </tbody>
    </table>
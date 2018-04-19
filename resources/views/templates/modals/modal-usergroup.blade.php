{{-- <div class="overlay"></div> --}}
{{-- <section id="usergroup-modal" class="modal">

    <header class="header-modal">
        <h3>Adicionar integrantes no grupo: {{ $group->name }}</h3>
    </header>

    <article class="body-modal">
        {!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
            
            @include('templates.forms.select', ['label' => 'Investidor','select' => 'user_id', 'values' => $users_list])
            @include('templates.forms.submit', ['input' => 'Adicionar']) --}}
            {{-- @include('templates.forms.select', ['label' => 'Investidor','select' => 'name', 'values' => $users_list]) --}}
         {{-- {!! Form::close() !!}
    </article>

    <footer class="footer-modal">
        <button class="close-modal">Cancelar</button>
    </footer>

</section>  --}}
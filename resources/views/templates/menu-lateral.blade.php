<nav id="navegacao">
    <ul>
        <li>
            <a href="" class="brand">    
                <img src="http://motivaimplantes.com.br/wp-content/uploads/2016/05/motiva-implants-logo-purple.png" alt="">
            </a>
        </li>
        
        <li>
            <a href="{{ route('user.dashboard') }}">
                <i class="fa fa-home"></i>
                <h3>Dashboard</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('user.index') }}" >
                <i class="fa fa-user"></i>
                <h3>Usuários</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('instituition.index') }}">
                <i class="fa fa-building"></i>
                <h3>Instituições</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('groups.index') }}">
                <i class="fa fa-users"></i>
                <h3>Grupos</h3>
            </a>
        </li>
    </ul>
</nav>
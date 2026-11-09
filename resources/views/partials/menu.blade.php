<header class="topo">
    <div class="container">
        <nav aria-label="navbar">
            <ul>
                <li><a href="{{ route('inicio') }}">{{config('app.name')}}</a></li>
                <li><a href="{{ route('inicio') }}" @if (request()->routeIs('eventos')) aria-current="page" @endif> Início</a></li>
                <li><a href="{{ route('eventos.index') }}" @if (request()->routeIs('eventos.*')) aria-current="page" @endif> Eventos</a></li>
                
            </ul>
        </nav>
    </div>
</header>
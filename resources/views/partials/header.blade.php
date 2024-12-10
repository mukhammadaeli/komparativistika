<header class="header">
    <div class="logo"><a href="{{ route('home') }}">КОМПАРАТИВИСТИКА</a></div>
    <nav class="navbar">
        <input type="text" class="search" placeholder="Искать книгу...">

        @auth
            <!-- Show Logout Button if User is Authenticated -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout">Выйти</button>
            </form>
        @else
            <!-- Show Login Button if User is Not Authenticated -->
            <a href="{{ route('login') }}">
                <button class="login">Войти</button>
            </a>
        @endauth
    </nav>
</header>

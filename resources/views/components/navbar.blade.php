@section('header')


<nav class="navbar navbar-expand-lg navbar-dark bg-navbar-custom">
    <div class="container">

        <a class="navbar-brand" href="/" style="font-family: 'Caveat'; font-style: italic;">
            "Vote It"
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Cas::auth())
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('votes*') ? 'active' : '' }}">
                    <a class="nav-link" href="/votes">Votes</a>
                </li>
                <li class="nav-item {{ Request::is('posts*') ? 'active' : '' }}">
                    <a class="nav-link" href="/posts">Forum</a>
                </li>
                <li class="nav-item {{ Request::is('help') ? 'active' : '' }}">
                        <a class="nav-link" href="/help">Help</a>
                </li>
                <li class="nav-item {{ Request::is('privacy') ? 'active' : '' }}">
                        <a class="nav-link" href="/privacy">Privacy</a>
                </li>
            </ul>
        </div>
        @endif


        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
        
            @if (Cas::guest())
            <li class="nav-item">
                <a class="nav-link" href="/login">{{ __('Login') }}</a>
            </li>
            @else
            {{-- @php
                $user = Cas::user();
            @endphp --}}
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- define dans layouts.app --}}
                    {{ $user->pseudo }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/user/{{$user->id}}">Profile</a>
                    <a class="dropdown-item" href="/groupe">UE</a>
                    {{-- define dans layouts.app --}}
                    @if ($user->isAdmin())
                        <a class="dropdown-item" href="/user/admin">Admin</a>
                    @endif
                    <a class="dropdown-item" href="user/logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="/user/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endif
        </ul>


    </div>
</nav>

<style>
    .bg-navbar-custom {
        background-color: grey;
    }
</style>

@endsection
<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" href='{{ route('home') }}' title="@lang('Home')">@lang('Home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('about') }}" href='{{ route('about') }}' title="@lang('About')">@lang('About')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive('projects.*') }}" href='{{ route('projects.index') }}' title="@lang('Projects')">@lang('Projects')</a>
                </li>
                <!-- con setActive('projects.*') podemos hacer que ser marque con cualquier ruta de projects -->
                <li class="nav-item">
                    <a class="nav-link {{ setActive('contact') }}" href='{{ route('contact') }}' title="@lang('Contact')">@lang('Contact')</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('login') }}" href='{{ route('login') }}' title="@lang('Login')">@lang('Login')</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >@lang('Logout')</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

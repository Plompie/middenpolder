<nav class="navbar-inverse bg-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/middenpolder">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Personen</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/personen">Personen<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/personen/create">Nieuwe persoon<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Medewerkers</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/medewerkers">Medewerkers enkel met id<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/persoonMedewerkers">Medewerkers met naam<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/medewerkers/create">Nieuwe medewerker<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Patienten</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/patienten">Patienten<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/patienten/create">Nieuwe patiënt<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Medicijnen</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/medicijnen">Medicijnen<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/medicijnen/create">Nieuw medicijn<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recepten</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/recepten">Recepten<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/recepten/create">Nieuw recept<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Afdelingen</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <p><a class="dropdown-item" href="/middenpolder/afdelingen">Afdelingen<span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-divider"><span class="sr-only">(current)</span></a></p>
                        <p><a class="dropdown-item" href="/middenpolder/afdelingen/create">Nieuwe afdeling<span class="sr-only">(current)</span></a></p>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/middenpolder/about">Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/middenpolder/help">Help</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/middenpolder/dashboard">Dashboard</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
        <div class="container">
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/#eventos">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('eventoPasado')}}">Eventos Pasados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('nuestroArbol')}}">Nuestros Árboles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="banner-secondary">
        <div class="container">
            <div class="banner-text">
                <div class="banner-heading ">
                    {{$titulo ?? ''}}
                </div>
            </div>
        </div>
    </div>
</header>
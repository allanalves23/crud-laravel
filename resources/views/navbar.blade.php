<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('produtos.*') ? 'active' : ''}}">
                <a class="nav-link" href="/produtos">Produtos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{request()->routeIs('categorias.*') ? 'active' : ''}}">
                <a class="nav-link" href="/categorias">Categorias <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
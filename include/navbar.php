<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img src="img/logo3.png" width="50"> Entradas & Salidas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Registrar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="entrada.php">Entradas</a></li>
                        <li><a class="dropdown-item" href="salida.php">Salidas</a></li>
                        <li><a class="dropdown-item" href="producto.php">Productos</a></li>
                    </ul>
                </li>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="listaEntradas.php">Entradas</a></li>
                        <li><a class="dropdown-item" href="listaSalidas.php">Salidas</a></li>
                        <li><a class="dropdown-item" href="listaProductos.php">Productos</a></li>
                    </ul>
                </li>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inventario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="totalProductosIngresados.php">Total de productos ingresados</a></li>
                        <li><a class="dropdown-item" href="totalSalidasProductos.php">Total de salidas por productos</a></li>
                        <li><a class="dropdown-item" href="totalSalidasEntradas.php">Total de salidas por entradas</a></li>
                    </ul>
                </li>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <a class="nav-link" href="action/cerrarSesion.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</nav>
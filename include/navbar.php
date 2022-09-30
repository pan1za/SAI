<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php"><img src="img/logo3.png" width="50"> Entradas & Salidas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <?php
                    if ($usertype == "admin") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="register.php">Usuarios</a></li>
                                <li><a class="dropdown-item" href="restaurante.php">Restaurante</a></li>
                                <li><a class="dropdown-item" href="sede.php">Sede</a></li>
                            </ul>
                        </li>
                    <?php
                    } elseif ($usertype == "user") { ?>
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
                    <?php
                    }
                    ?>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <?php
                    if ($usertype == "admin") { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Listar
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="listaEntradasAdmin.php">Entradas</a></li>
                                <li><a class="dropdown-item" href="listaSalidasAdmin.php">Salidas</a></li>
                                <li><a class="dropdown-item" href="listaProductosAdmin.php">Productos</a></li>
                            </ul>
                        </li>
                    <?php
                    } elseif ($usertype == "user") { ?>
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
                    <?php
                    }
                    ?>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <?php
                    if ($usertype == "admin") { ?>
                        <li class="nav-item dropdown">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Inventario
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="totalProductosIngresadosAdmin.php">Total de productos ingresados</a></li>
                                        <li><a class="dropdown-item" href="totalSalidasProductosAdmin.php">Total de salidas por productos</a></li>
                                        <li><a class="dropdown-item" href="totalProductosEntradasAdmin.php">Total de productos por entradas</a></li>
                                        <li><a class="dropdown-item" href="totalProductosInventarioAdmin.php">Total de productos en inventario</a></li>
                                    </ul>
                                </li>
                            </li>
                    <?php
                    } elseif ($usertype == "user") { ?>
                        <li class="nav-item dropdown">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Inventario
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="totalProductosIngresados.php">Total de productos ingresados</a></li>
                                    <li><a class="dropdown-item" href="totalSalidasProductos.php">Total de salidas por productos</a></li>
                                    <li><a class="dropdown-item" href="totalProductosEntradas.php">Total de productos por entradas</a></li>
                                    <li><a class="dropdown-item" href="totalProductosInventario.php">Total de productos en inventario</a></li>
                                </ul>
                            </li>
                        </li>
                    <?php
                    }
                    ?>
                <li>
                    <ul></ul>
                    <ul></ul>
                </li>
                <a class="nav-link" href="action/cerrarSesion.php">Cerrar sesión</a>
            </div>
        </div>
    </div>
</nav>
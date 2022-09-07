<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Lista de salidas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-5 col-10">Lista de salidas</h3><br>
    <div class="w-40 card-body ">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Salida</th>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total salida</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">ID de la Entrada</th>
                    <th scope="col">Realizada por</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conn->query('SELECT salidas.idSalida, salidas.idProducto, productos.nombreProducto, salidas.totalSalida, salidas.fechaSalida, salidas.idEntrada, 
                usuarios.nombres, usuarios.apellidos FROM salidas, productos, usuarios WHERE productos.idProducto = salidas.idProducto AND 
                usuarios.idUsuario = salidas.idUsuario ORDER BY salidas.idSalida;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['idSalida'] ?></td>
                        <td><?php echo $row['idProducto'] ?>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalSalida'] ?></td>
                        <td><?php echo $row['fechaSalida'] ?></td>
                        <td><?php echo $row['idEntrada'] ?></td>
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </td>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
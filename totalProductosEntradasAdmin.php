<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de productos por entradas</h3><br>
    <div class="w-100 card-body offset-0">
        <table class="table table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">ID entrada</th>
                    <th scope="col">Nombre del producto</th>
                    <!-- <th scope="col">Fecha de entrada</th> -->
                    <th scope="col">Entrada realizada por</th>
                    <th scope="col">Total entrada</th>
                    <th scope="col">Fecha de salida</th>
                    <th scope="col">Salida realizada por</th>
                    <th scope="col">Total salida</th>
                    <th scope="col">Total actual (entrada)</th>
                    <th scope="col">Sede</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php foreach ($conn->query("SELECT p.nombreProducto, e.idEntrada, u.nombres, u.apellidos, e.totalEntrada, p.unidadMedida, 
                s.fechaSalida, u2.nombres as nombres2, u2.apellidos as apellidos2, se.nombre, SUM(s.totalSalida) as totalSalidaEntradas 
                FROM productos p 
                INNER JOIN salidas s ON s.idProducto = p.idProducto 
                INNER JOIN entradas e ON e.idEntrada = s.idEntrada 
                INNER JOIN usuarios u ON u.idUsuario = e.idUsuario 
                INNER JOIN usuarios u2 ON s.idUsuario = u2.idUsuario 
                INNER JOIN sede se ON se.idSede = p.idSede
                GROUP BY e.idEntrada;") as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['idEntrada'] ?></td>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <!-- <td><?php echo $row['fechaEntrada'] ?></td> -->
                        <td><?php echo $row['nombres'] . ' ' . $row['apellidos'] ?></td>
                        <td><?php echo $row['totalEntrada'] . ' ' . $row['unidadMedida'] . '(s)' ?></td>
                        <!-- <td><?php echo $row['fechaSalida'] ?></td> -->
                        <td><?php echo $row['fechaSalida'] ?></td>
                        <td><?php echo $row['nombres2'] . ' ' . $row['apellidos2'] ?></td>
                        <td><?php echo $row['totalSalidaEntradas'] . ' ' . $row['unidadMedida'] . '(s)'?></td>
                        <td><?php echo $row['totalEntrada'] - $row['totalSalidaEntradas'] . ' ' . $row['unidadMedida'] . '(s)'?></td>
                        <td><?php echo $row['nombre'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
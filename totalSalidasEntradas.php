<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de salidas por entradas</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Fecha de entrada</th>
                    <th scope="col">Total entrada</th>
                    <th scope="col">Total salida</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conn->query('SELECT p.nombreProducto, e.fechaEntrada, e.totalEntrada, SUM(s.totalSalida) as totalSalidaEntradas 
                FROM productos p INNER JOIN salidas s ON s.idProducto = p.idProducto INNER JOIN entradas e ON e.idEntrada = s.idEntrada GROUP BY e.idEntrada;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['fechaEntrada'] ?></td>
                        <td><?php echo $row['totalEntrada'] ?></td>
                        <td><?php echo $row['totalSalidaEntradas'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
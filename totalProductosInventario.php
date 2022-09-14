<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de productos en inventario</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total inventario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conn->query('SELECT p.nombreProducto, i.totalActual, p.unidadMedida
                FROM productos p 
                INNER JOIN inventario i ON i.idProducto = p.idProducto 
                GROUP BY p.nombreProducto;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalActual'] . ' &nbsp' . $row['unidadMedida'] . '(s)'?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<!-- SELECT p.nombreProducto, e.fechaEntrada, u.nombres, u.apellidos, e.totalEntrada, s.fechaSalida, u2.nombres, u2.apellidos, SUM(s.totalSalida) as totalSalidaEntradas
FROM productos p 
INNER JOIN salidas s ON s.idProducto = p.idProducto 
INNER JOIN entradas e ON e.idEntrada = s.idEntrada 
INNER JOIN usuarios u ON u.idUsuario = e.idUsuario 
INNER JOIN usuarios u2 ON s.idUsuario = u2.idUsuario 
GROUP BY e.idEntrada; -->
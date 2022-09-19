<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por productos</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de salidas por productos</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total salidas</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php foreach ($conn->query('SELECT p.nombreProducto, SUM(totalSalida) as totalSalidaProductos, p.unidadMedida 
                FROM productos p INNER JOIN salidas s ON s.idProducto = p.idProducto GROUP BY p.nombreProducto;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalSalidaProductos'] . ' ' . $row['unidadMedida'] . '(s)'?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de productos actuales</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-4 col-10">Total de productos actuales</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total actuales</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conn->query('SELECT productos.nombreProducto, SUM(totalSalida) as totalSalidaProductos 
                FROM productos, salidas WHERE productos.idProducto = salidas.idProducto 
                GROUP BY productos.nombreProducto;') as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalSalidaProductos'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
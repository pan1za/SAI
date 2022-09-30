<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de salidas por entradas</title>
</head>
<?php include "include/navbar.php" ?>

<div class="container p-4">
    <h3 class="offset-3 col-10">Total de productos en inventario</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total inventario</th>
                    <th scope="col">Sede</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php foreach ($conn->query("SELECT p.nombreProducto, SUM(i.totalActual) as totalActual, p.unidadMedida, s.nombre
                FROM productos p 
                INNER JOIN inventario i ON i.idProducto = p.idProducto 
                INNER JOIN sede s ON s.idSede = p.idSede
                GROUP BY p.nombreProducto;") as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalActual'] . ' &nbsp' . $row['unidadMedida'] . '(s)'?></td>
                        <td><?php echo $row['nombre'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
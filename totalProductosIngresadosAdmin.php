<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Total de productos ingresados</title>
</head>
<?php include "include/navbar.php" ?>

<div class="container p-4">
    <h3 class="offset-4 col-10">Total de productos ingresados</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table table-bordered">
            <thead class="thead-dark" align="center">
                <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Total ingresados</th>
                    <th scope="col">Sede</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php foreach ($conn->query("SELECT p.nombreProducto, SUM(totalEntrada) as totalProductos, p.unidadMedida, s.nombre
                FROM productos p 
                INNER JOIN entradas e ON p.idProducto = e.idProducto 
                INNER JOIN sede s ON s.idSede = p.idSede
                GROUP BY p.nombreProducto;") as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['nombreProducto'] ?></td>
                        <td><?php echo $row['totalProductos'] . ' ' . $row['unidadMedida'] . '(s)'?></td>
                        <td><?php echo $row['nombre'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
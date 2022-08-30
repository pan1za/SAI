<?php
session_start();
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-3 col-10">Lista de productos</h3><br>
    <div class="w-50 card-body offset-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Unidad de medida</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>-----</td>
                    <td>-----</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>-----</td>
                    <td>-----</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>------</td>
                    <td>------</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
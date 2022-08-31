<?php
    session_start();
    include "../config/conexion.php";

    if(isset($_POST["guardarEntrada"])){
        $totalEntrada = $_POST["cantidad"];
        $fechaEntrada = $_POST["fechaEntrada"];
        $fechaVencimiento = $_POST["fechaVencimiento"];
        $idProducto = $_POST["idProducto"];

        $query = "INSERT INTO `entradas`(`totalEntrada`, `fechaEntrada`, `fechaVencimiento`, `idProducto`, `idUsuario`)
        VALUES ('$totalEntrada', '$fechaEntrada','$fechaVencimiento', '$idProducto', '2')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Hubo un error");
        }

        $_SESSION['message'] = 'Producto añadido correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ../entrada.php');
    }
?>
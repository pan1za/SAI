<?php
    session_start();
    include "../config/conexion.php";

    if(isset($_POST["guardarEntrada"])){
        $nombreProducto = $_POST["nombreProducto"];
        $unidadMedida = $_POST["unidadMedida"];
        $cantidad = $_POST["cantidad"];
        $fechaEntrada = $_POST["fechaEntrada"];
        $fechaVencimiento = $_POST["fechaVencimiento"];

        $query = "INSERT INTO `productos`(`nombreProducto`, `cantidad`, `unidadMedida`, `fechaEntrada`, `fechaVencimiento`, `idUsuario`)
        VALUES ('$nombreProducto','$cantidad', '$unidadMedida', '$fechaEntrada','$fechaVencimiento','3')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Hubo un error");
        }

        $_SESSION['message'] = 'Producto añadido correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ../entrada.php');
    }
?>
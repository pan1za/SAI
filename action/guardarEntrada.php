<?php

    include "../config/conexion.php";

    if(isset($_POST["guardarEntrada"])){
        $nombreProducto = $_POST["nombreProducto"];
        $cantidad = $_POST["cantidad"];
        $fechaEntrada = $_POST["fechaEntrada"];
        $fechaVencimiento = $_POST["fechaVencimiento"];
        $query = "INSERT INTO productos(nombreProducto, cantidad, fechaEntrada, fechaVencimiento, FK_idUsuario) 
        VALUES ('$nombreProducto', '$cantidad', '$fechaEntrada', '$fechaVencimiento', '2')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Hubo un error");
        }   

        $_SESSION['message'] = 'Producto añadido correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ../entrada.php');
    }
?>
<?php
    session_start();
    include "../config/conexion.php";

    if(isset($_POST["guardarSalida"])){
        $totalSalida = $_POST["cantidad"];
        $fechaSalida = $_POST["fechaSalida"];
        $idUsuario = $_SESSION["user_id"];
        $idProducto = $_POST["producto"];
        $idEntrada = $_POST["entrada"];

        $query = "INSERT INTO `salidas`(`totalSalida`, `fechaSalida`, `idUsuario`, `idProducto`, `idEntrada`)
        VALUES ('$totalSalida', '$fechaSalida','$idUsuario', '$idProducto', $idEntrada)";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Hubo un error");
        }

        $_SESSION['message'] = 'Producto añadido correctamente';
        $_SESSION['message_type'] = 'success';
        
    }
    header('Location: ../salida.php');
?>
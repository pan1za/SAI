<?php
    session_start();
    include "../config/conexion.php";

    if(isset($_POST["guardarProducto"])){
        $nombreProducto = $_POST["nombreProducto"];
        $unidadMedida = $_POST["unidadMedida"];

        $query = "INSERT INTO `productos`(`nombreProducto`, `unidadMedida`) VALUES ('$nombreProducto', '$unidadMedida')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Hubo un error");
        }

        $_SESSION['message'] = 'Producto añadido correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: ../producto.php');
    }
?>
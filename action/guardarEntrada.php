<?php
    session_start();
    include "../config/conexion.php";

    $totalEntrada = $_POST["cantidad"];
    $fechaEntrada = $_POST["fechaEntrada"];
    $fechaVencimiento = $_POST["fechaVencimiento"];
    $idProducto = $_POST["idProducto"];
    $idUsuario = $_SESSION["user_id"];

    $query = "INSERT INTO `entradas`(`totalEntrada`, `fechaEntrada`, `fechaVencimiento`, `idProducto`, `idUsuario`)
            VALUES ('$totalEntrada', '$fechaEntrada','$fechaVencimiento', '$idProducto', $idUsuario)";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $messages[] = "Entrada registrada";
    } else {
        $errors[] = "Algo ha salido mal, intenta nuevamente." . mysqli_error($conn);
    }

    if (isset($errors)){
        ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong>
                <?php
                    foreach ($errors as $error){
                        echo $error;
                    }
                ?>
        </div>
        <?php
    }
    if (isset($messages)){
        ?>
        <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Bien hecho!</strong>
                <?php
                    foreach ($messages as $message){
                        echo $message;
                    }
                ?>
        </div>
    <?php
    }
?>
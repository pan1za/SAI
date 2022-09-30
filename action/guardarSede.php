<?php
    session_start();
    include "../config/conexion.php";

    $nombreSede = $_POST["nombreSede"];
    $direccionSede = $_POST["direccionSede"];
    $idRestaurante = $_POST["idRestaurante"];

    $query = "INSERT INTO `sede`(`nombre`, `direccion`, `idRestaurante`) VALUES ('$nombreSede', '$direccionSede', '$idRestaurante')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $messages[] = "Sede registrada";
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
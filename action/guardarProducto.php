<?php
    session_start();
    include "../config/conexion.php";

    $nombreProducto = $_POST["nombreProducto"];
    $unidadMedida = $_POST["unidadMedida"];

    $query = "INSERT INTO `productos`(`nombreProducto`, `unidadMedida`) VALUES ('$nombreProducto', '$unidadMedida')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $messages[] = "Producto registrado";
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
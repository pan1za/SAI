<?php
    include "config/conexion.php";

    $idRestaurante = $_POST["idRestaurante"];

    if(isset($idRestaurante)){
        $query = "SELECT s.idSede, s.nombre
        FROM sede s
        INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante
        WHERE r.idRestaurante = '$idRestaurante'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);

        if(mysqli_num_rows($result)>0){
            echo '<option selected="selected" disabled value="">Seleccione una sede</option>';
            while($row=mysqli_fetch_array($result)){
                echo '<option value='.$row['idSede'].'>'.$row['nombre'].'</option>';
            }
        }else{
            echo '<option selected disabled value="">No hay sedes de este restaurante</option>';
        }
    }
?>


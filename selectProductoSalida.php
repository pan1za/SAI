<?php

    require "config/conexion.php";

    $idProducto = $_POST["idProducto"];

    if(isset($idProducto)){
        //$query = "SELECT entradas.idEntrada FROM entradas WHERE entradas.idProducto = '$idProducto'";
        $query = "SELECT * FROM entradas WHERE idProducto = '$idProducto'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);

        if(mysqli_num_rows($result)>0){
            echo '<option selected="selected">Seleccione una entrada</option>';
            while($row=mysqli_fetch_array($result)){
                echo '<option value='.$row['idProducto'].'>'.$row['fechaEntrada'].'</option>';
            }
        }
    }
?>
<?php
    include "config/conexion.php";

    $idProducto = $_POST["idProducto"];

    if(isset($idProducto)){
        $query = "SELECT e.idEntrada, e.fechaEntrada, i.totalActual, p.unidadMedida
        FROM entradas e
        INNER JOIN productos p ON p.idProducto = e.idProducto
        INNER JOIN inventario i ON i.idEntrada = e.idEntrada 
        WHERE i.idProducto = '$idProducto'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);

        if(mysqli_num_rows($result)>0){
            echo '<option selected="selected" disabled value="">Seleccione una entrada</option>';
            while($row=mysqli_fetch_array($result)){
                echo '<option value='.$row['idEntrada'].'>'.'Entrada: '.$row['fechaEntrada']. ' - '.$row['totalActual'].' '.$row['unidadMedida'].'(s)'.' restantes'.'</option>';
            }
        }else{
            echo '<option selected disabled value="">No hay entradas de este producto</option>';
        }
    }
?>


<?php
    session_start();
    include "config/conexion.php";

    if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
        header("location: index.php");
    }
    
    $my_user_id = $_SESSION["user_id"];

    if ($my_user_id != "admin"){
        $query = mysqli_query($conn,"SELECT u.nombres, u.apellidos, u.email, u.username, u.usertype, r.idRestaurante, 
                                r.nombre as nombreRestaurante, u.idSede, s.nombre as nombreSede
                                from usuarios u 
                                INNER JOIN sede s ON s.idSede = u.idSede
                                INNER JOIN restaurante r ON r.idRestaurante = s.idRestaurante
                                where idUsuario = $my_user_id");
        while($row = mysqli_fetch_array($query)){
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $email = $row['email'];
            $username = $row['username'];
            $usertype = $row['usertype'];
            $idRestaurante = $row['idRestaurante'];
            $nombreRestaurante= $row['nombreRestaurante'];
            $idSede = $row['idSede'];
            $nombreSede = $row['nombreSede'];
        }
    }
    
    if ($my_user_id != "user"){
        $query = mysqli_query($conn,"SELECT u.nombres, u.apellidos, u.email, u.username, u.usertype from usuarios u where idUsuario = $my_user_id");
        while($row = mysqli_fetch_array($query)){
            $nombres = $row['nombres'];
            $apellidos = $row['apellidos'];
            $email = $row['email'];
            $username = $row['username'];
            $usertype = $row['usertype'];
        }
    }
    
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="bootstrap\css\styles.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<?php include "scripts.php"; ?>
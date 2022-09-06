<?php
    session_start();
    include_once "config/conexion.php";

    if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == null) {
        header("location: index.php");
    }
    $my_user_id = $_SESSION["user_id"];
    $query = mysqli_query($conn,"SELECT * from usuarios where idUsuario = $my_user_id");
    while($row = mysqli_fetch_array($query)){
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        $email = $row['email'];
        $username = $row['username'];
        $usertype = $row['usertype'];
    }
?>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="bootstrap\css\styles.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
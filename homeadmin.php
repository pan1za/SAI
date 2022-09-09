<?php
//include "config/conexion.php";
include "include/head.php";

if($usertype != "admin"){
    header("location: home.php");
}

include "include/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home admin</title>
</head>
<body>

    <h3>Bienvenido <?php echo $nombres . ' ' . $apellidos ?></h3>
</body>
</html>
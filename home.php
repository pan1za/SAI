<?php
session_start();
include "config/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "include/head.php"
    ?>
    <title>Home</title>
</head>
<body>
    <?php
        include "include/navbar.php"
    ?>
    <h2>Bienvenido</h2><?php echo $_SESSION["email"] ?>
</body>
</html>
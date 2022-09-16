<?php
    $host = "localhost";
    $user = "root";
    $password = "innova";
    $db = "module3";

    // usar PDO 
    $conn = @mysqli_connect($host, $user, $password, $db);
    if(!$conn){
        @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos</h2>");
        // @die("<h2 style='text-align:center'>Imposible conectarse a la base de datos</h2>".mysqli_error($conn));
    }
    if (@mysqli_connect_errno()) {
        @die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
?>
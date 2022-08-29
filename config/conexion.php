<?php
    $host = "localhost";
    $user = "root";
    $password = "innova";
    $db = "module";

    $conn = @mysqli_connect($host, $user, $password, $db);
    if(!$conn){
        @die("<h2 style='aling:center'>No se puede conectar a la base de datos </h2>");
    }
?>
<?php
    session_start();
    include "../config/conexion.php";

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from usuarios where email = '".$email."' and password = '".$password."'";
        $result=mysqli_query($conn, $sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="user"){
            $_SESSION["user_id"] = $row["idUsuario"];
            session_start();

            // if(isset($_SESSION['email'])){
            //     session_unset();
            // }
            header("location:../home.php");
        }
        elseif($row["usertype"]=="admin"){
            $_SESSION["email"]=$email;
            header("location:../homeadmin.php");
        }
        else{
            echo "<script>alert(\"Usuario o contraseña incorrecta\"); window.location=\"../index.php\"</script>";
        }
    }

?>
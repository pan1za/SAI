<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap\css\styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Registrarse - Sistema de Asesorías Innova</title>
</head>

<body class="login-page">
    <div class="login-box">
        <!-- <div class="login-logo">
            <a href=""><img src="img/logo.png"></a>
        </div> -->
        <div class="login-box-body">
            <p class="login-box-msg">Regístrate</p>
            <form id="add" name="add" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombres" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <br>
                <div class="form-group has-feedback">
                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <br>
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <br>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <br>
                <div class="row">
                    <br>
                    <div class="col-xs-8">
                        <div class="col-xs-4">
                            <button type="submit" id="save_data" class="btn btn-primary btn-flat w-100">Crear cuenta</button>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <p>¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
                </div>
            </form>
        </div>
        <br>
        <div id="result"></div>
    </div>



    <?php
    include "include/scripts.php";
    ?>

    <script>
        $("#add").submit(function(event) {
            $('#save_data').attr("disabled", true);

            var parametros = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "action/register.php",
                data: parametros,
                beforeSend: function(objeto) {
                    $("#result").html("Mensaje: Cargando...");
                },
                success: function(datos) {
                    $("#result").html(datos);
                    $('#save_data').attr("disabled", false);
                }
            });
            event.preventDefault();
        })
    </script>


</body>

</html>
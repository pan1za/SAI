<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar restaurantes</title>
</head>
<?php include "include/navbar.php" ?>

<div class="container p-4">
    <h3 class="offset-3 col-10">Registro de restaurantes</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarRestaurante" name="agregarRestaurante" method="POST">
            <div class="form-group mb-3">
                <label for="nombreRestaurante" class="form-label">Nombre del restaurante</label>
                <input type="text" class="form-control" name="nombreRestaurante" required autofocus>
            </div>
            <div class="form-group mb-3">
                <label for="nit" class="form-label">NIT del restaurante</label>
                <input type="number" class="form-control" name="nit" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarRestaurante">Guadar restaurante</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#agregarRestaurante").submit(function(event) {
        $('#guardarRestaurante').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/guardarRestaurante.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#guardarRestaurante').attr("disabled", false);
            }
        });
        event.preventDefault();
    })
</script>
<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar productos</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-3 col-10">Registro de productos</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarProduto" name="agregarProduto" method="POST">
            <div class="form-group mb-3">
                <label for="nombreProducto" class="form-label">Nombre del producto</label>
                <input type="text" class="form-control" name="nombreProducto" required autofocus>
            </div>
            <div class="form-group mb-3">
                <label for="cantidad" class="form-label">Unidad de medida</label>
                <select class="form-select" name="unidadMedida" required>
                    <option selected disabled value="">Seleccione una opción</option>
                    <option value="unidad">Unidad</option>
                    <option value="kilogramo">Kilogramo</option>
                    <option value="gramo">Gramo</option>
                    <option value="mililitro">Mililitro</option>
                    <option value="gramo">Litro</option>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarProducto">Guadar producto</button>
            </div>
        </form>
    </div>
</main>

<script>
    $("#agregarProduto").submit(function(event) {
        $('#guardarProducto').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/guardarProducto.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#guardarProducto').attr("disabled", false);
            }
        });
        event.preventDefault();
    })
</script>
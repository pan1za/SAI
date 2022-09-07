<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar entradas</title>
</head>
<?php include "include/navbar.php" ?>

<main class="container p-4">
    <h3 class="offset-3 col-10">Registro de entradas</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarEntrada" name="agregarEntrada" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombre del producto</label>
                <select class="form-select" name="idProducto" required>
                    <option selected disabled value="">Seleccione un producto</option>
                    <?php foreach ($conn->query('SELECT * from productos') as $row) {
                    ?>
                        <option value="<?php echo $idProducto = $row["idProducto"]?>"><?php echo $row['nombreProducto'], ' (' . $row['unidadMedida'] . ')' ?></option>
                    <?php
                    }   
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fechaEntrada" class="form-label">Fecha de entrada</label>
                <input type="date" name="fechaEntrada" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fechaVencimiento" class="form-label">Fecha de vencimiento</label>
                <input type="date" name="fechaVencimiento" class="form-control" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarEntrada">Guadar entrada</button>
            </div>
        </form>
    </div>
</main>

<script>
    $("#agregarEntrada").submit(function(event) {
        $('#guardarEntrada').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/guardarEntrada.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#guardarEntrada').attr("disabled", false);
            }
        });
        event.preventDefault();
    })
</script>
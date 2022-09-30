<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar sedes</title>
</head>
<?php include "include/navbar.php" ?>

<div class="container p-4">
    <h3 class="offset-3 col-10">Registro de sedes</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarSede" name="agregarSede" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Restaurante</label>
                <select class="form-select" name="idRestaurante" required>
                    <option selected disabled value="">Seleccione un restaurante</option>
                    <?php foreach ($conn->query('SELECT * from restaurante') as $row) {
                    ?>
                        <option value="<?php echo $idRestaurante = $row["idRestaurante"]?>"><?php echo $row['nombre'] ?></option>
                    <?php
                    }   
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nombreSede" class="form-label">Nombre de la sede</label>
                <input type="text" class="form-control" name="nombreSede" required autofocus>
            </div>
            <div class="form-group mb-3">
                <label for="direccionSede" class="form-label">Dirección de la sede</label>
                <input type="text" class="form-control" name="direccionSede" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarSede">Guadar sede</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#agregarSede").submit(function(event) {
        $('#guardarSede').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/guardarSede.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#guardarSede').attr("disabled", false);
            }
        });
        event.preventDefault();
    })
</script>
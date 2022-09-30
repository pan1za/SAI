<?php
//include "config/conexion.php";
include "include/head.php";
include "include/navbar.php";
?>

<head>
    <title>Registrar salidas</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="plugins/jQuery/jquery-3.6.0.min.js"></script> -->
</head>
<!-- MESSAGE -->


<div class="container p-4">
    <h3 class="offset-3 col-10">Registro de salidas</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarSalida" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombre del producto</label>
                <select class="form-select" id="producto" name="producto" required>
                    <option selected disabled>Seleccione un producto</option>
                    <?php 
                        $query = "SELECT * FROM productos WHERE idSede = '$idSede'";
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                            echo '<option value='.$row['idProducto'].'>'.$row['nombreProducto'].' ('.$row['unidadMedida'].')'.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Entrada</label>
                <select class="form-select" id="entrada" name="entrada" required>
                    <option selected disabled>Seleccione una entrada</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="fechaSalida" class="form-label">Fecha de salida</label>
                <input type="date" name="fechaSalida" class="form-control" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarSalida">Guadar salida</button>
            </div>
        </form>
    </div>
</div>

<script>
    $("#agregarSalida").submit(function(event) {
        $('#guardarSalida').attr("disabled", true);

        var parametros = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "action/guardarSalida.php",
            data: parametros,
            beforeSend: function(objeto) {
                $("#result").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $("#result").html(datos);
                $('#guardarSalida').attr("disabled", false);
            }
        });
        event.preventDefault();
    })
</script>

<script type="text/javascript">
    $(function(){
        $("#producto").on('change', function(){
            var idProducto = $("#producto").val();
            $.ajax({
                type:'POST',    
                url:'selectProductoSalida.php',
                data:{'idProducto':idProducto},
                success:function(data){
                    $("#entrada option").remove();
                    $("#entrada").append(data);
                }
            });
            return false;
        });
    });
</script>
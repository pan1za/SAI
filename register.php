<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar usuarios</title>
</head>
<?php include "include/navbar.php" ?>

<div class="container p-4">
    <h3 class="offset-3 col-10">Registro de usuarios</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <div id="result"></div>
        <form id="agregarSede" name="agregarSede" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombres</label>
                <input type="text" name="nombres" name="nombres" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Restaurante</label>
                <select class="form-select" id="restaurante" name="restaurante" required>
                    <option selected disabled>Seleccione un restaurante</option>
                    <?php 
                        $query = "SELECT * FROM restaurante";
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                            echo '<option value='.$row['idRestaurante'].'>'.$row['nombre'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Sede</label>
                <select class="form-select" id="sede" name="sede" required>
                    <option selected disabled>Seleccione una sede</option>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" id="guardarSede">Guadar usuario</button>
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
            url: "action/register.php",
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

<script type="text/javascript">
    $(function(){
        $("#restaurante").on('change', function(){
            var idRestaurante = $("#restaurante").val();
            $.ajax({
                type:'POST',    
                url:'selectRestauranteSede.php',
                data:{'idRestaurante':idRestaurante},
                success:function(data){
                    $("#sede option").remove();
                    $("#sede").append(data);
                }
            });
            return false;
        });
    });
</script>
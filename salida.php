<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar salidas</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="plugins/jQuery/jquery-3.6.0.min.js"></script> -->
</head>
<?php include "include/navbar.php" ?>

<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php session_unset();
} ?>

<main class="container p-4">
    <h3 class="offset-3 col-10">Registro de salidas</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <form action="action/guardarSalida.php" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombre del producto</label>
                <select class="form-select" id="producto" required>
                    <option selected disabled>Seleccione un producto</option>
                    <?php 
                        $query = "SELECT * FROM productos";
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_array($result)){
                            echo '<option value='.$row['idProducto'].'>'.$row['nombreProducto'].' ('.$row['unidadMedida'].')'.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Entrada</label>
                <select class="form-select" id="entrada" required>
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
                <button type="submit" class="btn btn-success bt-block" name="guardarSalida">Guadar salida</button>
            </div>
        </form>
    </div>
</main>

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
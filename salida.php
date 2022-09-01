<?php
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Registrar salidas</title>
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
                <select class="form-select" name="idProducto" required>
                    <!-- UN PRODUCTO NO TIENE MUCHAS SALIDAS, ARREGLAR EN LA BASE DE DATOS - UN PRODUCTO TIENE MUCHAS ENTRADAS?-->
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
                <label for="fechaSalida" class="form-label">Fecha de salida</label>
                <input type="date" name="fechaSalida" class="form-control" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" name="guardarSalida">Guadar salida</button>
            </div>
        </form>
    </div>
</main>

<!-- <main class="container p-4">
    <div class="card card-body offset-1 col-10">
        <p>Registro de entradas</p>
        <form action="/action/guardarEntrada.php" method="POST">
            <div class="form-group mb-3">
                <input type="text" name="nombreProducto" class="form-control" placeholder="Nombre del producto" autofocus>
            </div>
            <div class="form-group mb-3">
                <input type="number" name="cantidad" class="form-control" placeholder="Cantidad">
            </div>
            <div class="form-group mb-3">
                <input type="date" name="fechaEntrada" class="form-control">
            </div>
            <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
            </div>
            <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
    </div>
</main> -->
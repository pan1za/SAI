<?php
session_start();
include "config/conexion.php";
?>

<head>
    <?php include "include/head.php" ?>
    <title>Entradas</title>
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
    <h3 class="offset-3 col-10">Registro de entradas</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <form action="action/guardarEntrada.php" method="POST">
            <div class="form-group mb-3">
                <label for="cantidad" class="form-label">Nombre del producto</label>
                <select class="form-select" name="unidadMedida" required>
                    <option selected disabled value="">Seleccione una producto</option>
                    <option value="unidad">Pan</option>
                    <option value="kilogramo">Huevos</option>
                    <option value="gramo">Camarones</option>
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
            <button type="submit" class="btn btn-success bt-block" name="guardarEntrada">Guadar entrada</button>
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
<?php
include "config/conexion.php";
$totalEntrada = '';
$fechaEntrada = '';
$fechaVencimiento = '';

if (isset($_GET['idEntrada'])) {
    $idEntrada = $_GET['idEntrada'];
    $query = "SELECT * FROM entradas WHERE idEntrada=$idEntrada";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $totalEntrada = $row['totalEntrada'];
        $fechaEntrada = $row['fechaEntrada'];
        $fechaVencimiento = $row['fechaVencimiento'];
    }
}

if (isset($_POST['update'])) {
    $idEntrada = $_GET['idEntrada'];
    $totalEntrada = $_POST['totalEntrada'];
    $fechaEntrada = $_POST['fechaEntrada'];
    $fechaVencimiento = $_POST['fechaVencimiento'];

    $query = "UPDATE entradas set totalEntrada = '$totalEntrada', fechaEntrada = '$fechaEntrada', fechaVencimiento = '$fechaVencimiento' WHERE idProducto=$idProducto";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Producto editado correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: listaEntradas.php');
}

if (isset($_POST['cancell'])) {
    header('Location: listaEntradas.php');
}

?>

<head>
    <?php include "include/head.php" ?>
    <title>Editar entradas</title>
</head>

<?php include('include/navbar.php'); ?>
<div class="container p-4">
    <h3 class="offset-5 col-10">Editar entradas</h3><br>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editarProducto.php?idEntrada=<?php echo $_GET['idEntrada']; ?>" method="POST">
                    <div class="form-group mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input name="nombreProducto" type="text" class="form-control" value="<?php echo $nombreProducto; ?>" placeholder="Nuevo nombre de producto">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cantidad" class="form-label">Unidad de medida</label>
                        <select class="form-select" name="unidadMedida" required>
                            <option value="unidad">Unidad</option>
                            <option value="kilogramo">Kilogramo</option>
                            <option value="gramo">Gramo</option>
                            <option value="mililitro">Mililitro</option>
                            <option value="gramo">Litro</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success bt-block" name="update">
                            Update
                        </button>
                        <button type="submit" class="btn btn-danger bt-block" name="cancell">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container p-4">
    <h3 class="offset-3 col-10">Editar entrada</h3><br>
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
</div>
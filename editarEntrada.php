<?php
include "config/conexion.php";
$totalEntrada = '';
$fechaEntrada = '';
$fechaVencimiento = '';

//modificar trigger de entrada, ya que si se hace una modificacion de una cantidad y ya existe una salida, no se actualiza el valor que debe ser en el inventario 

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

    $query = "UPDATE entradas set totalEntrada = '$totalEntrada', fechaEntrada = '$fechaEntrada', fechaVencimiento = '$fechaVencimiento' WHERE idEntrada=$idEntrada";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Entrada editada correctamente';
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
    <h3 class="offset-3 col-10">Editar entrada</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <!-- <div id="result"></div> -->
        <form action="editarEntrada.php?idEntrada=<?php echo $_GET['idEntrada']; ?>" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombre del producto</label>
                <?php foreach ($conn->query("SELECT * from productos p 
                                            INNER JOIN entradas e ON e.idProducto = p.idProducto WHERE e.idEntrada = $idEntrada") as $row) {
                ?>
                    <input type="text" class="form-control" disabled value="<?php echo $row['nombreProducto'], ' (' . $row['unidadMedida'] . ')' ?>">
                <?php
                }
                ?>

            </div>
            <div class="form-group mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="totalEntrada" class="form-control" value="<?php echo $row['totalEntrada'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="fechaEntrada" class="form-label">Fecha de entrada</label>
                <input type="date" name="fechaEntrada" class="form-control" value="<?php echo $row['fechaEntrada'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="fechaVencimiento" class="form-label">Fecha de vencimiento</label>
                <input type="date" name="fechaVencimiento" class="form-control" value="<?php echo $row['fechaVencimiento'] ?>">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" name="update">Update</button>
                <button type="submit" class="btn btn-danger bt-block" name="cancell">Cancelar</button>
            </div>
        </form>
    </div>
</div>
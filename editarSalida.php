<?php
include "config/conexion.php";
$totalSalida = '';
$fechaSalida = '';

if (isset($_GET['idSalida'])) {
    $idSalida = $_GET['idSalida'];
    $query = "SELECT * FROM salidas WHERE idSalida=$idSalida";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $totalSalida = $row['totalSalida'];
        $fechaSalida = $row['fechaSalida'];
    }
}

if (isset($_POST['update'])) {
    $idSalida = $_GET['idSalida'];
    $totalSalida = $_POST['totalSalida'];
    $fechaSalida = $_POST['fechaSalida'];

    $query = "UPDATE salidas set totalSalida = '$totalSalida', fechaSalida = '$fechaSalida' WHERE idSalida=$idSalida";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Salida editada correctamente';
    $_SESSION['message_type'] = 'warning';
    header('Location: listaSalidas.php');
}

if (isset($_POST['cancell'])) {
    header('Location: listaSalidas.php');
}

?>

<head>
    <?php include "include/head.php" ?>
    <title>Editar salidas</title>
</head>

<?php include('include/navbar.php'); ?>

<div class="container p-4">
    <h3 class="offset-3 col-10">Editar salida</h3><br>
    <div class="card w-50 card-body offset-3 ">
        <!-- <div id="result"></div> -->
        <form action="editarSalida.php?idSalida=<?php echo $_GET['idSalida']; ?>" method="POST">
            <div class="form-group mb-3">
                <label class="form-label">Nombre del producto</label>
                <?php foreach ($conn->query("SELECT * from productos p 
                                            INNER JOIN salidas e ON e.idProducto = p.idProducto 
                                            WHERE e.idSalida = $idSalida") as $row) {
                ?>
                    <input type="text" class="form-control" disabled value="<?php echo $row['nombreProducto'], ' (' . $row['unidadMedida'] . ')' ?>">
                <?php
                }
                ?>
            </div>
            
            <div class="form-group mb-3">
                <label class="form-label">Cantidad</label>
                <input type="number" name="totalSalida" class="form-control" value="<?php echo $row['totalSalida'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="fechaSalida" class="form-label">Fecha de salida</label>
                <input type="date" name="fechaSalida" class="form-control" value="<?php echo $row['fechaSalida'] ?>">
            </div>

            <!-- si quito esto deja de funcionar el input disabled de abajo -->
            <!-- <div class="form-group mb-3">
                <label class="form-label">Entrada</label>
                <?php foreach ($conn->query("SELECT * FROM entradas e
                                            INNER JOIN productos p ON p.idProducto = e.idProducto
                                            INNER JOIN salidas s ON s.idEntrada = s.idEntrada 
                                            WHERE s.idSalida = $idSalida") as $row) {
                ?>
                    <input type="text" class="form-control" disabled value="<?php echo 'Entrada: '.$row['fechaEntrada'] . 'ID: '.$row['idEntrada']?>">
                <?php
                }
                ?>
            </div> -->
            <div class="form-group mb-3">
                <?php
                $query2 = "SELECT * FROM entradas e
                INNER JOIN productos p ON p.idProducto = e.idProducto
                INNER JOIN salidas s ON s.idEntrada = s.idEntrada 
                WHERE s.idSalida = $idSalida";
                $result2 = mysqli_query($conn,$query2);
                $count2 = mysqli_num_rows($result2);

                if(mysqli_num_rows($result2)>0){
                    ?>
                    <input type="text" class="form-control" disabled value="<?php echo  'Entrada: '.$row['fechaEntrada'] . ' - ID entrada: '.$row['idEntrada']?>">
                <?php
                }
                ?>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success bt-block" name="update">Update</button>
                <button type="submit" class="btn btn-danger bt-block" name="cancell">Cancelar</button>
            </div>
        </form>
    </div>
</div>
<?php
include "config/conexion.php";
$nombreProducto = '';
$unidadMedida = '';

if (isset($_GET['idProducto'])) {
    $idProducto = $_GET['idProducto'];
    $query = "SELECT * FROM productos WHERE idProducto=$idProducto";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombreProducto = $row['nombreProducto'];
        $unidadMedida = $row['unidadMedida'];
    }
}

if (isset($_POST['update'])) {
    $idProducto = $_GET['idProducto'];
    $nombreProducto = $_POST['nombreProducto'];
    $unidadMedida = $_POST['unidadMedida'];

    $query = "UPDATE productos set nombreProducto = '$nombreProducto', unidadMedida = '$unidadMedida' WHERE idProducto=$idProducto";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Producto editado correctamente editado';
    $_SESSION['message_type'] = 'warning';
    header('Location: listaProductos.php');
}

if (isset($_POST['cancell'])) {
    header('Location: listaProductos.php');
}

?>

<head>
    <?php include "include/head.php" ?>
    <title>Editar productos</title>
</head>

<?php include('include/navbar.php'); ?>
<div class="container p-4">
    <h3 class="offset-5 col-10">Editar productos</h3><br>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editarProducto.php?idProducto=<?php echo $_GET['idProducto']; ?>" method="POST">
                    <div class="form-group mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del producto</label>
                        <input name="nombreProducto" type="text" class="form-control" value="<?php echo $nombreProducto; ?>" placeholder="Nuevo nombre de producto">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cantidad" class="form-label">Unidad de medida</label>
                        <select class="form-select" name="unidadMedida" >
                            <option value="<?php echo $unidadMedida?>">
                            <?php 
                            $unidadM = $unidadMedida;
                            $unidadM = ucfirst($unidadM);
                            echo $unidadM
                            ?>
                            </option>
                            <?php
                            if($unidadMedida === 'unidad'){ ?>
                                <option value="kilogramo">Kilogramo</option>
                                <option value="gramo">Gramo</option>
                                <option value="mililitro">Mililitro</option>
                                <option value="litro">Litro</option>
                            <?php
                            } elseif ($unidadMedida === 'kilogramo'){ ?>
                                <option value="unidad">Unidad</option>
                                <option value="gramo">Gramo</option>
                                <option value="mililitro">Mililitro</option>
                                <option value="litro">Litro</option>
                            <?php
                            } elseif ($unidadMedida === 'gramo'){ ?>
                                <option value="unidad">Unidad</option>
                                <option value="kilogramo">Kilogramo</option>
                                <option value="mililitro">Mililitro</option>
                                <option value="litro">Litro</option>
                            <?php
                            } elseif ($unidadMedida === 'mililitro'){ ?>
                                <option value="unidad">Unidad</option>
                                <option value="kilogramo">Kilogramo</option>
                                <option value="gramo">Gramo</option>
                                <option value="litro">Litro</option>
                            <?php
                            } elseif ($unidadMedida === 'litro'){ ?>
                                <option value="unidad">Unidad</option>
                                <option value="kilogramo">Kilogramo</option>
                                <option value="gramo">Gramo</option>
                                <option value="mililitro">Mililitro</option>
                            <?php
                            }
                            ?>
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


<?php

// toca cambiar en la base de datos que las relaciones sean en cascada, y
//a que al momento de eliminar un producto también se eliminarán las entradas y salidas si las tiene

include "config/conexion.php";

if(isset($_GET['idProducto'])) {
  $idProducto = $_GET['idProducto'];
  $query = "DELETE FROM productos WHERE idProducto = $idProducto";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Producto eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: listaProductos.php');
}

?>

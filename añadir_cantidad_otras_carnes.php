<?php
include 'conexion.php';

$id = $_POST['id'];
$cantidadAgregar = $_POST['cantidad_agregar'];

$sql = "UPDATE otras_carnes SET cantidad = cantidad + $cantidadAgregar WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    header("Location: otras_carnes.php?mensaje=Cantidad añadida correctamente");
    exit();
} else {
    echo "Error: " . $conexion->error;
}
?>

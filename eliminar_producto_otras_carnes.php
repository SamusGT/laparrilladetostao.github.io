<?php
include 'conexion.php';

if (isset($_POST['id']) && isset($_POST['cantidad_eliminar'])) {
    $id = intval($_POST['id']);
    $cantidadEliminar = intval($_POST['cantidad_eliminar']);

    // Obtener la cantidad actual
    $consulta = "SELECT cantidad FROM otras_carnes WHERE id = $id";
    $resultado = $conexion->query($consulta);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $cantidadActual = intval($fila['cantidad']);

        if ($cantidadEliminar >= $cantidadActual) {
            // Si la cantidad a eliminar es mayor o igual, eliminar el producto completo
            $conexion->query("DELETE FROM otras_carnes WHERE id = $id");
        } else {
            // Si no, solo restar la cantidad
            $nuevaCantidad = $cantidadActual - $cantidadEliminar;
            $conexion->query("UPDATE otras_carnes SET cantidad = $nuevaCantidad WHERE id = $id");
        }

        header("Location: otras_carnes.php?mensaje=Producto eliminado correctamente");
        exit;
    } else {
        header("Location: otras_carnes.php?mensaje=Producto no encontrado");
        exit;
    }
} else {
    header("Location: otras:carnes.php?mensaje=Datos incompletos");
    exit;
}
?>
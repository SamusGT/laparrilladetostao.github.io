<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $cantidad_agregar = intval($_POST['cantidad_agregar']);

    // Verificar si el producto existe
    $sql = "SELECT cantidad FROM bavaria WHERE id = $id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nueva_cantidad = $fila['cantidad'] + $cantidad_agregar;

        $sql_update = "UPDATE bavaria SET cantidad = $nueva_cantidad WHERE id = $id";
        if ($conexion->query($sql_update) === TRUE) {
            header("Location: bavaria.php?mensaje=Cantidad añadida correctamente");
            exit();
        } else {
            echo "Error al actualizar: " . $conexion->error;
        }
    } else {
        echo "Producto no encontrado.";
    }
}
?>

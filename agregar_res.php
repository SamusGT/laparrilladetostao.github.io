<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $vencimiento = $_POST['fecha'];

    // Guardar imagen
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTmp = $_FILES['imagen']['tmp_name'];
    $rutaDestino = 'imagenes/' . $imagenNombre;

    if (move_uploaded_file($imagenTmp, $rutaDestino)) {
        // Insertar en la base de datos
        $sql = "INSERT INTO res (nombre, cantidad, fecha, imagen)
                VALUES ('$nombre', '$cantidad', '$vencimiento', '$rutaDestino')";

        if ($conexion->query($sql)) {
            header("Location: res.php?mensaje=Producto añadido correctamente");
            exit;
        } else {
            echo "Error al guardar en la base de datos: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "Acceso no permitido.";
}
?>

<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "restaurante";

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}
?>

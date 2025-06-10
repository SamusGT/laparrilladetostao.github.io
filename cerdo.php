<?php
include 'conexion.php';
$sql = "SELECT * FROM cerdo";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos de Cerdo</title>
    <link rel="stylesheet" href="diseño_postobon.css"> <!-- mismo CSS -->
</head>
<body>
    <h1>Productos de Cerdo</h1>

    <?php if (isset($_GET['mensaje'])): ?>
        <p class="mensaje"><?php echo htmlspecialchars($_GET['mensaje']); ?></p>
    <?php endif; ?>

    <div class="centrado">
        <a href="crear_producto_cerdo.html"><button class="btn-verde">Añadir producto</button></a>
    </div>

    <div class="contenedor-productos">
        <?php if ($resultado->num_rows > 0): ?>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <div class="producto">
                    <h3><?php echo $fila['nombre']; ?></h3>
                    <p>ID: <?php echo $fila['id']; ?></p>
                    <p>Cantidad: <?php echo $fila['cantidad']; ?></p>
                    <p>Vence: <?php echo $fila['fecha']; ?></p>
                    <img src="<?php echo $fila['imagen']; ?>" alt="Imagen" class="producto-imagen">

                    <form action="añadir_cantidad_cerdo.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <input type="number" name="cantidad_agregar" placeholder="Cantidad a añadir" required>
                        <button type="submit" class="btn-verde">+</button>
                    </form>
                    
                    <form action="eliminar_producto_cerdo.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                        <input type="number" name="cantidad_eliminar" placeholder="Cantidad a eliminar" required>
                        <button type="submit" class="btn-rojo">-</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No hay productos aún.</p>
        <?php endif; ?>
    </div>

    <div class="centrado">
        <a href="index.html"><button>⬅</button></a>
    </div>
</body>
</html>

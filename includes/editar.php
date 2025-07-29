<?php
require_once 'db.php';
$db = new DB_Conexion();

$id = $_GET['id'] ?? null;
$usuario = $db->obtenerUsuario($id);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../css/stylesEditar.css">
</head>
<body>
    <h2>Editar Usuario</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required><br>
        <label>Oficio:</label>
        <input type="text" name="oficio" value="<?= $usuario['oficio'] ?>" required><br>
        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?= $usuario['direccion'] ?>" required><br>
        <label>Edad:</label>
        <input type="number" name="edad" value="<?= $usuario['edad'] ?>" required><br>
        <label>Correo:</label>
        <input type="text" name="correo" value="<?= $usuario['correo'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

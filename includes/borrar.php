<?php
require_once 'db.php';
$db = new DB_Conexion();

$id = $_GET['id'] ?? null;

if ($id && $db->borrarUsuario($id)) {
    header("Location: ../dashboard.php");
    exit();
} else {
    echo "Error al borrar usuario.";
}
?>

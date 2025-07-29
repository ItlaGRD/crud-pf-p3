<?php
require_once 'db.php';
$db = new DB_Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $oficio = $_POST['oficio'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $correo = $_POST['correo'] ?? '';

    if ($db->insertarUsuario($nombre, $oficio, $direccion, $edad, $correo)) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Error al insertar usuario.";
    }
}
?>


<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $oficio = $_POST['oficio'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, oficio, direccion, edad, correo) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nombre, $oficio, $direccion, $edad, $correo]);

    header("Location: ../dashboard.php"); // Puedes redirigir o mostrar mensaje
    exit();
}
?>

<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = $_POST['usuario'];
    $contra = $_POST['contraseña'];

    $db = new DB_Conexion();
    $resultado = $db->validarUsuario($usuario, $contra); //  Captura el resultado

    if ($resultado) {
        //  Usuario válido, se inicia sesión
        $_SESSION['admin_id'] = $resultado['id'];
        $_SESSION['admin_usuario'] = $resultado['usuario'];
        
        echo json_encode(['success' => true]);
    } else {
        //  Usuario o contraseña incorrectos
        echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas']);
    }
}


?>
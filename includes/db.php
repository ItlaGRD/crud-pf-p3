<?php
class DB_Conexion {
    private $host = 'localhost';
    private $dbname = 'crud_pf_p3';
    private $user = 'root';
    private $pass = '';
    private $pdo;

    // Conexión automática al instanciar
    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    // Acceso externo al objeto PDO si lo necesitas
    public function getPDO() {
        return $this->pdo;
    }

    // Listar usuarios
    public function obtenerUsuarios() {
        $stmt = $this->pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll();
    }

    // Insertar usuario
    public function insertarUsuario($nombre, $oficio, $direccion, $edad, $correo) {
        $sql = "INSERT INTO usuarios (nombre, oficio, direccion, edad, correo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $oficio, $direccion, $edad, $correo]);
    }

    // Obtener uno para edición
    public function obtenerUsuario($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Actualizar usuario
    public function actualizarUsuario($id, $nombre, $oficio, $direccion, $edad, $correo) {
        $sql = "UPDATE usuarios SET nombre = ?, oficio = ?, direccion = ?, edad = ?, correo = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nombre, $oficio, $direccion, $edad, $correo, $id]);
    }

    // Eliminar usuario
    public function borrarUsuario($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Validación de usuario
    public function validarUsuario($usuario, $clave) {
        $stmt = $this->pdo->prepare("SELECT * FROM administrador WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $resultado = $stmt->fetch();

        return ($resultado && $clave === $resultado['clave']) ? $resultado : false;
    }
}
?>

<?php
class DB_Conexion {
    private $host = 'localhost';
    private $dbname = 'crud_pf_p3';
    private $user = 'root';
    private $pass = '';

    // Crea la conexión con PDO
    private function getConexion(){
        try {
            $obPDO = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->user, $this->pass);
            $obPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $obPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $obPDO;
        } catch (PDOException $e){
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    // Validación de usuario
    public function validarUsuario($usuario, $clave){
        $pdoConexion = $this->getConexion();
        $sql = "SELECT * FROM administrador WHERE usuario = :usuario";
        $stmt = $pdoConexion->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $resultado = $stmt->fetch();

        //En proyectos reales password_hash() y verificar con password_verify()
        if ($resultado && $clave === $resultado['clave']) {
            return $resultado;
        } else {
            return false;
        }
    }
}
?>

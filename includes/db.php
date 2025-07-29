<?php
<<<<<<< Updated upstream

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'crud_pf_p3';

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die("Error de conexion " .$conn->connection_error);
}
=======
    class DB_Conexion {
        private $host = 'localhost';
        private $dbname = 'crud_pf_p3';
        private $user = 'root';
        private $pass = '';

        private function getConexion(){
            try{
                $obPDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->user, $this->pass);
                $obPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $obPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                return $obPDO;
            } catch (PDOException $e){
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }
        }

        public function validarUsuario($usuario, $clave){
            $pdoConexion = $this->getConexion();

            $sql = "select * from administrador where usuario= :usuario";
            $stmt = $pdoConexion->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $resultado = $stmt->fetch();

            
            if($resultado && $clave === $resultado['clave']){
                return $resultado;
            } else {
                return false;
            }
        }
    }
>>>>>>> Stashed changes

?>
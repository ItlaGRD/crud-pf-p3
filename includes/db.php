<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'crud_pf_p3';

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    die("Error de conexion " .$conn->connection_error);
}

?>
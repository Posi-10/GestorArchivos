<?php
  class Conexion {
    public function conectar() {
        $servidor = 'localhost';
        $usuario = 'root';
        $password = '';
        $database = 'gestor';
        $conexion = mysqli_connect($servidor,
                                   $usuario,
                                   $password,
                                   $database);
        $conexion->set_charset('utf8mb4');
        return $conexion;
    }
  }
?>
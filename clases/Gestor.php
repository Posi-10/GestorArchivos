<?php
  require_once "Conexion.php";
  class Gestor extends Conexion{
    public function agregaRegistroArchivo(){
      $conexion = Conexion::conectar();
    }
  }
?>
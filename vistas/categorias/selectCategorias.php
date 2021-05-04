<?php
  session_start();
  require_once "../../clases/Conexion.php";
  
  $Conexion = new Conexion();
  $Conexion = $Conexion->conectar();
?>
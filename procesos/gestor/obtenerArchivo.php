<?php
  session_start();
  require_once "../../clases/Gestor.php";
  $Gestor = new Gestor();
  $id_archivo = $_POST['id_archivo'];
  echo $Gestor->obtenerRutaArchivo($id_archivo);
?>
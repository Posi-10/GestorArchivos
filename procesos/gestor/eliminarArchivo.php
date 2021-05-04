<?php
  session_start();
  require_once "../../clases/Gestor.php";
  $Gestor = new Gestor();
  $id_usuarios = $_SESSION['id_usuarios'];
  $id_archivo = $_POST['id_archivo'];
  $nombreArchivo = $Gestor->obtenerNombreArchivo($id_archivo);
  $ruta = "../../archivos/" . $id_usuarios . "/" . $nombreArchivo;
  if(unlink($ruta)){
    echo $Gestor->eliminarArchivo($id_archivo);
  }else{
    echo 0;
  }
  
?>
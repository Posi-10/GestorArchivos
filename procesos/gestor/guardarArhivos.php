<?php
  session_start();
  require_once "../../clases/Gestor.php";
  $Gestror = new Gestor();
  $id_categoria = $_POST['categoriasArchivos'];
  $id_usuarios = $_SESSION['id_usuarios'];
  if($_FILES['archivos']['size'] > 0){
    $totalArchivos = count($_FILES['archivos']['name']);
    for($i = 0; $i < $totalArchivos; $i++){
      $nombreArchivo = $_FILES['archivos']['name'][$i];
      $explode = explode(".", $nombreArchivo);
      $tipoArchivo = array_pop($explode);
      $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
      $carpeta = "../../archivos/";
      $rutaFinal = $carpeta . $nombreArchivo;
      echo move_uploaded_file($rutaAlmacenamiento, $rutaFinal);
    }
  }else{
    echo 0;
  }
?>
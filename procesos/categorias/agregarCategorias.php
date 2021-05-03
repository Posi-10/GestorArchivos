<?php
  session_start();
  require_once "../../clases/Categorias.php";
  $Categorias = new Categorias();
  $datos = array(
    "id_usuarios" => $_SESSION['id_usuarios'],
    "categoria" => $_POST['categoria']
  );
  echo $Categorias->agrgarCategoria($datos);
?>
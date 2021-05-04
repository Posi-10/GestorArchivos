<?php
  require_once "../../clases/Categorias.php";
  $Categorias = new Categorias();
  $datos = array(
    "id_categoria" => $_POST['id_categoria'],
    "categoria" => $_POST['categoriaU']
  );
  echo $Categorias->actualizaCategoria($datos);
?>
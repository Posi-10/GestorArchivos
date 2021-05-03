<?php
  session_start();
  require_once "../../../clases/Usuario.php";
  $usuario = $_POST['login'];
  $pass = sha1($_POST['pass']);
  $entrarUsuario = new Usuario();
  echo $entrarUsuario->login($usuario, $pass);
?>
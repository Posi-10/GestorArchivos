<?php
  require_once "../../../clases/Usuario.php";
  $pass = sha1($_POST['pass']); //la funcion sha1 es para incriptar
  $fecha = explode("-", $_POST['fechaNacimiento']);
  $fecha = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
  $datos = array(
    "nombre" => $_POST['nombre'], 
    "fechaNacimiento" => $fecha, 
    "email" => $_POST['email'], 
    "usuario" => $_POST['usuario'],
    "pass" => $pass
  );
  $usuario = new Usuario();
  echo $usuario->agregarUsuario($datos);
?>

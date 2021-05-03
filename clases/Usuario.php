<?php
  require_once 'conexion.php';

  class Usuario extends Conexion{
    public function agregarUsuario($datos){
      $conexion = Conexion::conectar();
      if(Usuario::comprobarUsuario($datos['usuario'])) {
        return 2;
      }else if(Usuario::comprobarEmail($datos['email'])){
        return 3;
      }else{
        $sql = "INSERT INTO t_usuarios (nombre, 
                                        fechaNacimiento, 
                                        email, 
                                        usuario, 
                                        pass) 
                VALUES (?, ?, ?, ?, ?)";
          $query = $conexion->prepare($sql);
          $query->bind_param('sssss', $datos['nombre'],
                                      $datos['fechaNacimiento'],
                                      $datos['email'],
                                      $datos['usuario'],
                                      $datos['pass']
                            );
          $exito = $query->execute();
          $query->close();
          return $exito;
      }
    }
    public function comprobarUsuario($usuario) {
      $conexion = Conexion::conectar();
      $sql = "SELECT usuario FROM t_usuarios WHERE usuario = '$usuario'";
      $result = mysqli_query($conexion, $sql);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $usuario) {
        return 1;
      }else{
        return 0;
      }
    }
    public function comprobarEmail($email) {
      $conexion = Conexion::conectar();
      $sql = "SELECT email FROM t_usuarios WHERE email = '$email'";
      $result = mysqli_query($conexion, $sql);
      $dato = mysqli_fetch_assoc($result);
      if ($dato != "" || $dato == $email) {
        return 1;
      }else{
        return 0;
      }
    }
    public function login($usuario, $pass) {
      $conexion = Conexion::conectar();
      $sql = "SELECT count(*) AS siExiste FROM t_usuarios WHERE usuario = '$usuario' AND pass = '$pass'";
      $result = mysqli_query($conexion, $sql);
      $respuesta = mysqli_fetch_array($result)['siExiste'];
      if($respuesta > 0){
        $_SESSION['usuario'] = $usuario;
        $sql = "SELECT id_usuarios FROM t_usuarios WHERE usuario = '$usuario' AND pass = '$pass'";
        $result = mysqli_query($conexion, $sql);
        $id_usuarios = mysqli_fetch_row($result)[0];
        $_SESSION['id_usuarios'] = $id_usuarios;
        return 1; 
      }else{
        return 0;
      }
    }
  }
?>
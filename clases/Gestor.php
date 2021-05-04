<?php
  require_once "Conexion.php";
  class Gestor extends Conexion{
    public function agregaRegistroArchivo($datos){
      $conexion = Conexion::conectar();
      $sql = "INSERT INTO t_archivos (id_usuarios,
                                      id_categoria,
                                      nombre,
                                      tipo,
                                      ruta)
              VALUES (?, ?, ?, ?, ?)";
      $query = $conexion->prepare($sql);
      $query->bind_param("iisss", $datos["id_usuarios"],
                                  $datos["id_categoria"],
                                  $datos["nombre"],
                                  $datos["tipo"],
                                  $datos["ruta"]
      );
      $exito = $query->execute();
      $query->close();
      return $exito;
    }
  }
?>
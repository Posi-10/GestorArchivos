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
    public function obtenerNombreArchivo($id_archivo){
      $conexion = Conexion::conectar();
      $sql = "SELECT nombre
              FROM t_archivos 
              WHERE id_archivo = '$id_archivo'";
      $result = mysqli_query($conexion, $sql);
      return mysqli_fetch_array($result)['nombre'];
    }
    public function eliminarArchivo($id_archivo){
      $conexion = Conexion::conectar();
      $sql = "DELETE FROM t_archivos
              WHERE id_archivo = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param('i', $id_archivo);
      $exito = $query->execute();
      $query->close();
      return $exito;
    }
  }
?>